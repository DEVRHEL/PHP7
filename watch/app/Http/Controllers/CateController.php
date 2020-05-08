<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;
class CateController extends Controller
{
    public function getAdd()
    {
        $parent=Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.add',compact('parent'));
    }
    public function postAdd(CateRequest $request)
    {
        $cate=new Cate;
        $cate->name=$request->txtCateName;
        $cate->alias=changeTitle($request->txtCateName);
        $cate->order=$request->txtOrder;
        $cate->parent_id=$request->sltParent;
        $cate->keywords=$request->txtKey;
        $cate->description=$request->txtDes;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Complete Add Category']);
    }
    public function getList()
    {
        $data=Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.cate.list',compact('data'));
    }
    public function getDelete($id)
    {
        $checkparent=Cate::where('parent_id',$id)->count();
        if($checkparent==0)
        {
            $cate=Cate::find($id);
            $cate->delete($id);
            return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Complete Delete Category']);
        }
        else
        {
            return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Can Not Delete Category']);
        }
    }
   public function getEdit($id)
    {
        $data=Cate::findOrFail($id)->toArray();
        $parent=Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('parent','data','id'));
    }
    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                "txtCateName"=>"required|unique:cates,name"
            ],[
                "txtCateName.required"=>"Please Enter Category Name",
                "txtCateName.unique'=>'This Name Category Is Exist"
            ]
            );
        $cate=Cate::find($id);
        $cate->name=$request->txtCateName;
        $cate->alias=changeTitle($request->txtCateName);
        $cate->order=$request->txtOrder;
        $cate->parent_id=$request->sltParent;
        $cate->keywords=$request->txtKey;
        $cate->description=$request->txtDes;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Complete Edit Category']);
    }
}
