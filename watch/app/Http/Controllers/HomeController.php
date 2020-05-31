<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use DB,Mail;
//use Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(12)->get();
        return view('user.pages.home',compact('product'));
    }
    public function getType($id)
    {
        $product_cate=DB::table('products')->select('id','name','image','price','alias')->where('cate_id',$id)->orderBy('id','DESC')->paginate(8);
        return view('user.pages.cate',compact('product_cate'));
    }
    public function getDetail($id)
    {
        $product=DB::table('products')->find($id);
        $stock=DB::table('cates')->select('order')->where('id',$product->cate_id)->first();
        $product_img=DB::table('product_images')->where('product_id',$id)->get();
        $product_new=DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        //print_r($product_img);
        return view('user.pages.detail',compact('product','stock','product_img','product_new'));
    }
    public function getContact()
    {
        return view('user.pages.contact');
    }
    public function postContact(Request $request)
    {
        $data=['name'=>$request->name,'mess'=>$request->message];
        Mail::send('user.pages.blank',$data,function ($msg){
            $msg->from('ruthietrumbauer77@gmail.com','Customer');
            $msg->to('ruthietrumbauer77@gmail.com','Admin')->subject('Customer Contact');
        });
        return redirect()->route('getContact')->with(['flash_message'=>'Thank you ^^ Send message successfully']);
    }
    public function getBuy($id)
    {
        $product_buy = DB::table('products')->where('id',$id)->first();
        \Cart::add(array('id'=>$id,'name'=>$product_buy->name,'quantity'=>1,'price'=>$product_buy->price,'attributes'=>array('img'=>$product_buy->image)));
        return redirect()->route('getCart');
    }
    public function getCart()
    {
        if(Auth::check())
        {
            $content = \Cart::getContent();
            return view('user.pages.cart',compact('content'));
        }
        else
        {
            return redirect()->route('authfb');
        }
    }
    public function deleteCart($id)
    {
        \Cart::remove($id);
        return redirect()->route('getCart');
    }
    public function updateCart()
    {
        if (\Request::ajax())
        {
            $id = \Request::get('id');
            $qty = \Request::get('qty');
            \Cart::update($id, array('quantity'=>$qty));
            echo "OK";
        }
    }
    public function clearCart()
    {
        \Cart::clear();
        return redirect()->route('getCart');
    }
    public function postCheckout(Request $request)
    {
        $data=['user'=>$request->user,'email'=>$request->email,'phonenumber'=>$request->phonenumber,'cartval'=>$request->cartval];
        Mail::send('user.pages.blankcheckout',$data,function ($msg){
            $msg->from('ruthietrumbauer77@gmail.com','Customer');
            $msg->to('ruthietrumbauer77@gmail.com','Admin')->subject('Customer Order');
        });
        return redirect()->route('getContact')->with(['flash_message'=>'Thank you ^^ Order successfully']);
    }
}
