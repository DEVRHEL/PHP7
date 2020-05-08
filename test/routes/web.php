<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('hihi/{id}', function($id) {
    echo "this is number $id";
}); // su dung pattern Global Constraints RouteServiceProvider.php

Route::get('/', function () {
    //return view('welcome');
    echo "OK duoc chua";
});
Route::get('testt', function() {
    return "lap trinh laravel";
});
Route::get('xinchao/{name}', function($ten) {
	echo "Xin chao $ten";
});
Route::get('today/{day}/{month}', function($day, $month) {
    echo "Today is $day/$month";
})->where(['day'=>'[0-9]+','month'=>'[0-9]+']);
Route::get('hello/{name?}', function($ten="unknown") {
    echo "Xin chao ban $ten";
})->where(['name'=>'[a-zA-Z]+']);
Route::get('trangnguon', function() {
    echo "This is trang nguon";
})->name('nguon');
Route::get('trangdich', function() {
    return redirect()->route('nguon');
    // return redirect("trangnguon");
});

// Group Route

Route::group(['prefix' => 'user'], function() {
    Route::get('add', function() { echo "this is add"; })->name('add');
	Route::get('edit', function() { echo "this is edit"; });
	Route::get('delete', function() { echo "this is delete"; });
});
// redirect trong group
Route::get('redirect', function() {
    // cach 1
    //return redirect()->route('add');
    //cach 2
    return redirect('user/add');
});

// goi view

View::share('title','Lap trinh Laravel'); // share toan bo cac view
Route::get('view1', function(){
	return view('layout.header1');
});
Route::get('view2', function() {
    return view('layout.header2');
});
View::composer(['layout.header1','layout.header2'], function($view2){  //view composer chi dua vao du lieu trong view duoc chi dinh
	return $view2->with('var1','Day la var1');
});
Route::get('checkview', function() {
    if(view()->exists('layout.header1'))
    {
    	return view('layout.header1');
    }
    else
    {
    	echo 'khong ton tai view nay';
    }
});
Route::get('appt', function() {
    return view('app'); // app.php hay app.blade.php van ok
});

// Blade Template

Route::get('blade', function() {
    return view('blade.layout'); // phai dat ten file la xxx.blade.php
});

// URL

Route::get('url', function() {
    return URL::full();
});
Route::get('url/asset', function() {
    return URL::asset('public/css/mystyle.css',true); // true la https
});
Route::get('url/to', function() {
    return URL::to('today',['1','1'],true);
});
Route::get('url/secure', function() {
    return secure_url('today',['1','1']); // chi su dung cho https
});

// Query builder

Route::get('query/select', function() {
    $data = DB::table('ab')->get();
    echo "<pre>";
    print_r($data);
    echo "<pre>";
});
Route::get('query/selectcol', function() {
    $data = DB::table('ab')->select('hoten')->where('hoten','HP')->get(); // khi muon them dk nua thi them mot cai where nua
    /*
    DB::table('ab')->where('id','>',8)->get();
    DB::table('ab')->orderBy('hoten','DESC')->get();
    DB::table('ab')->skip(3)->take(2)->get(); select offset and limit
    DB::table('ab')->whereBetween('id',[1,2])->get(); select where between
    DB::table('ab')->whereNotBetween('id',[1,2])->get();
    DB::table('ab')->whereIn('id',[1,3,4])->get();
    DB::table('ab')->whereNotIn('id',[1,3,4])->get();
     */
    echo "<pre>";
    print_r($data);
    echo "<pre>";
});
Route::get('query/join', function() {
    // chi join nhung ban khong co khoa ngoai
    $data = DB::table('ab')->join('dt','ab.id','=','dt.id')->where('ab.id','=',4)->get();
    echo "<pre>";
    print_r($data);
    echo "<pre>";
});
Route::get('query/insert', function() {
    DB::table('ab')->insert(
        [['hoten'=>'AA','sdt'=>'9999999989','email'=>'aaa@gmail.com'],
        ['hoten'=>'ABA','sdt'=>'9999999989','email'=>'aaa@gmail.com'],
        ['hoten'=>'AAA','sdt'=>'9999999989','email'=>'aaa@gmail.com'],]
    );
/*
    $id = DB::table('ab')->insertGetId([]);
    return $id;
 */
    return "insert thanh cong";
});
Route::get('query/update', function() {
    DB::table('ab')->where('id',4)->update(['hoten'=>'ASUSS']);
    return "update thanh cong";
});
Route::get('query/delete', function() {
    DB::table('ab')->where('id',2)->delete();
    return "delete thanh cong";
});

// Eloquent ORM

Route::get('model/select', function() {
    $data = App\Product::all()->toArray(); // ->tojSon();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/selectid', function() {
    $data = App\Product::find(4)->toArray(); // ->tojSon();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/where', function() {
    $data = App\Product::where('id','>',3)->get()->toArray(); // co where thi phai co get
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/take', function() {
    $data = App\Product::where('id','>',3)->take(2)->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/raw', function() {
    $data = App\Product::whereRaw('id = ? and hoten = ?',[4,'ASUSS'])->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/insert', function() {
    $product = new App\Product;
    $product->hoten = 'AAAA';
    $product->email = 'testa@gmail.com';
    $product->sdt = 9999999999;
    $product->save();
    echo "OK";
    /* hoac:
    $data = array(
        'hoten'=>'AAAA',
        'email'=>'testa@gmail.com',
        'sdt'=>'9999999989'
    );
    App\Product::create($data)

     */
});
Route::get('model/update', function() {
    $product = App\Product::find(4);
    $product->hoten = 'ASUS';
    $product->save();
});
Route::get('model/delete', function() {
    App\Product::destroy(12);
});
Route::get('model/test', function() {
    return App\Product::test();
});
Route::get('model/om', function() {
    $data = App\Product::find(4)->images()->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/oo', function() {
    $data = App\Images::find(4)->product()->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/mmm', function() {
    $data = App\Cars::find(4)->color()->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

// Form

Route::get('form/dangky', function () {
    return view('form.dangky');
});
Route::post('form/dangkytv', ['as'=>'postDangKy','uses'=>'ControllerDK@them']);

// Response

Route::get('response/json', function (){
   $arr = [
       'mon hoc'=>'laravel',
       'giang vien'=>'mr a',
       'thoi gian'=>'3 thang'
   ];
   return Response::json($arr);
});
Route::get('response/download', function(){
    $url = 'public/downloads/ahihi.rar';
    return Response::download($url);
});
Route::get('response/downloadanddelete', function(){
    $url = 'public/downloads/ahihi.rar';
    return Response::download($url)->deleteFileAfterSend(true);
});
Route::get('response/macro', function (){
    return response()->cap('laravel framework');
});
Route::get('response/macro2', function (){
   return response()->contact('https://abc.com');
});

// Authentication

Route::get('authen/login',['as'=>'getLogin','uses'=>'ThanhVien@getLogin']);
Route::post('authen/login',['as'=>'postLogin','uses'=>'ThanhVien@postLogin']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('authen/getRegister',['as'=>'getRegister', 'uses'=>'Auth\RegisterController@getRegister']);
Route::post('authen/register',['as'=>'register', 'uses'=>'Auth\RegisterController@postRegister']);

// RESTful

Route::resource('hocsinh','HocSinhController');

// CKEF

Route::get('testck', function (){
   return view('test');
});
