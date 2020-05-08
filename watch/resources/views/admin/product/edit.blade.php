@extends('admin.master')
@section('classproduct')
    active
@endsection
@section('content')
    <form action="{!! route('admin.product.postEdit',$data['id']) !!}" name="frmEditProduct" method="post" enctype="multipart/form-data" class="form-horizontal">

    <div class="container-fluid">
    <div class="row-fluid">
            <div class="span9">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Product Edit</h5>
        </div>
        <div class="widget-content nopadding">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li class="alert alert-danger">{{$error}}</li>
                            @endforeach
                        @endif
                        <input type="text" name="txtName" class="span11" placeholder="Please Enter Product Name" value="{!! $data['name'] !!}"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                        <input type="text" name="txtPrice" class="span11" placeholder="Please Enter Price" value="{!! $data['price'] !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category</label>
                    <div class="controls">
                        <select name="sltCate">
                            <option value="{!! $data['cate_id'] !!}">Please Choose Category</option>
                            <?php cate_parent($cate,0,"--",$data['cate_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Intro</label>
                    <div class="controls">
                        <textarea name="txtIntro" id="txtIntro" class="span11" >{!! $data['intro'] !!}</textarea>
                        <script>
                            CKEDITOR.replace('txtIntro',{
                                filebrowserBrowseUrl: '{{ asset('public/admin/ckfinder/ckfinder.html') }}',
                                filebrowserImageBrowseUrl: '{{ asset('public/admin/ckfinder/ckfinder.html?type=Images') }}',
                                filebrowserFlashBrowseUrl: '{{ asset('public/admin/ckfinder/ckfinder.html?type=Flash') }}',
                                filebrowserUploadUrl: '{{ asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                filebrowserImageUploadUrl: '{{ asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                filebrowserFlashUploadUrl: '{{ asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                            })
                        </script>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Content</label>
                    <div class="controls">
                        <textarea name="txtContent" id="txtContent" class="span11" >{!! $data['content'] !!}</textarea>
                        <script>
                            CKEDITOR.replace('txtContent',{
                                filebrowserBrowseUrl: '{{ asset('public/admin/ckfinder/ckfinder.html') }}',
                                filebrowserImageBrowseUrl: '{{ asset('public/admin/ckfinder/ckfinder.html?type=Images') }}',
                                filebrowserFlashBrowseUrl: '{{ asset('public/admin/ckfinder/ckfinder.html?type=Flash') }}',
                                filebrowserUploadUrl: '{{ asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                filebrowserImageUploadUrl: '{{ asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                filebrowserFlashUploadUrl: '{{ asset('public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                            })
                        </script>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                        <img src="{!! asset('resources/upload/'.$data['image']) !!}" style="width: 150px;" alt="">
                        <input type="hidden" name="img_current" value="{!! $data['image'] !!}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Image Upload</label>
                    <div class="controls">
                        <input name="fImages" type="file" value="{!! old('fImages') !!}"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Product Keywords</label>
                    <div class="controls">
                        <input type="text" name="txtKey" class="span11" placeholder="Please Enter Product Keywords" value="{!! $data['keywords'] !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Product Description</label>
                    <div class="controls">
                        <textarea name="txtDes" class="span11" >{!! $data['description'] !!}</textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
                </div>
            </div>
        </div>


        <div class="span3">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Product Image Edit</h5>
                </div>
                <div class="widget-content nopadding">
                    @foreach($pro_img as $key => $item)
                        <div class="control-group" id="{!! $key !!}">
                            <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" id="{!! $item['id'] !!}" idr="{!! $key !!}" style="width: 120px;">
                            <a href="javascript:void(0)" type="button" id="del_img" class="btn btn-warning">Delete</a>
                        </div>
                    @endforeach
                    <div class="control-group">
                        <button type="button" class="btn btn-primary" id="addImage">Add Images</button>

                    </div>
                        <div class="control-group" id="insert"></div>

                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{url('public/admin/js/myscript.js')}}"></script>
    </div>
    </div>
    </form>

@endsection
