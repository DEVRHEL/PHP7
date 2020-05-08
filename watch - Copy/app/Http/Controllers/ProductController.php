<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request; dung ajax thi khong dung respone nay de goi static
use App\Product;
use App\Cate;
use App\Http\Requests\ProductRequest;
use Input,File;
use App\ProductImage;
use Request;
use function mysql_xdevapi\expression;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function getAdd()
    {
        $cate=Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $request)
    {
        $filename=$request->file('fImages')->getClientOriginalName();
        $request->file('fImages')->move('resources/upload/',$filename);
        $product = new Product();
        $product->name=$request->txtName;
        $product->alias=changeTitle($request->txtname);
        $product->price=$request->txtPrice;
        $product->intro=$request->txtIntro;
        $product->content=$request->txtContent;
        $product->image=$filename;
        $product->keywords=$request->txtKey;
        $product->description=$request->txtDes;
        $product->user_id=Auth::user()->id;
        $product->cate_id=$request->sltCate;
        $product->save();

        $product_id=$product->id;
        $check=$request->file('fProductDetail');
        if (isset($check) && !empty($check))
        {
            foreach ($check as $item) {
                if (isset($item) && !empty($item))
                {
                    $product_img=new ProductImage();
                    $product_img->image=$item->getClientOriginalName();
                    $product_img->product_id=$product_id;
                    $item->move('resources/upload/detail/',$item->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('admin.product.getList')->with(['flash_message'=>'Complete Add Product']);
    }
    public function getList()
    {
        $data=Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }
    public function getDelete($id)
    {
        $data = Product::find($id)->pimage()->get()->toArray();
        if(isset($data) && !empty($data))
        {
            foreach ($data as $value)
            {
                File::delete('resources/upload/detail/'.$value['image']);
            }
        }
        $product=Product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.getList')->with(['flash_message'=>'Complete Delete Product']);
    }
    public function getEdit($id)
    {
        $cate=Cate::select('id','name','parent_id')->get()->toArray();
        $pro_img=Product::find($id)->pimage()->get()->toArray();
        $data=Product::find($id)->toArray();
        return view('admin.product.edit',compact('cate','data','pro_img'));
    }
    public function postEdit(Request $request, $id)
    {
        if(!empty(Request::file('fProductDetail')))
        {
            foreach (Request::file('fProductDetail') as $file)
            {
                $product_img=new ProductImage();
                if(isset($file))
                {
                    $product_img->image=$file->getClientOriginalName();
                    $product_img->product_id=$id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                }
                $product_img->save();
            }
        }

        $product=Product::find($id);
        $product->name=Request::input('txtName');
        $product->alias=changeTitle(Request::input('txtName'));
        $product->price=Request::input('txtPrice');
        $product->intro=Request::input('txtIntro');
        $product->content=Request::input('txtContent');
        $product->keywords=Request::input('txtKey');
        $product->description=Request::input('txtDes');
        $product->user_id=Auth::user()->id;
        $product->cate_id=Request::input('sltCate');
        if(!empty(Request::file('fImages')))
        {
            $img_current='resources/upload/'.Request::input('img_current');
            $file_name=Request::file('fImages')->getClientOriginalName();
            $product->image=$file_name;
            Request::file('fImages')->move('resources/upload/',$file_name);
            if(File::exists($img_current))
            {
                File::delete($img_current);
            }
        }
        $product->save();
        return redirect()->route('admin.product.getList')->with(['flash_message'=>'Complete Update Product']);
    }
    public function getDelImg($id)
    {
        if(Request::ajax())
        {
            $idImg=(int)Request::get('idImg');
            $image_detail=ProductImage::find($idImg);
            if (!empty($image_detail))
            {
                $img='resources/upload/detail/'.$image_detail->image;
                if(File::exists($img))
                {
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "OK";
        }
    }
}
