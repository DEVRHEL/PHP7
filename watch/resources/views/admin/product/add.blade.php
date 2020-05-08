@extends('admin.master')
@section('classproduct')
    active
    @endsection
@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Product Add</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{!! route('admin.product.postAdd') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li class="alert alert-danger">{{$error}}</li>
                            @endforeach
                        @endif
                        <input type="text" name="txtName" class="span11" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                        <input type="text" name="txtPrice" class="span11" placeholder="Please Enter Price" value="{!! old('txtPrice') !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category</label>
                    <div class="controls">
                        <select name="sltCate">
                            <option value="">Please Choose Category</option>
                            <?php cate_parent($cate,0,"--",old('sltCate')); ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Intro</label>
                    <div class="controls">
                        <textarea name="txtIntro" id="txtIntro" class="span11" >{!! old('txtIntro') !!}</textarea>
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
                        <textarea name="txtContent" id="txtContent" class="span11" >{!! old('txtContent') !!}</textarea>
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
                    <label class="control-label">Image Upload</label>
                    <div class="controls">
                        <input name="fImages" type="file" value="{!! old('fImages') !!}"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Product Keywords</label>
                    <div class="controls">
                        <input type="text" name="txtKey" class="span11" placeholder="Please Enter Product Keywords" value="{!! old('txtKey') !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Product Description</label>
                    <div class="controls">
                        <textarea name="txtDes" class="span11" >{!! old('txtDes') !!}</textarea>
                    </div>
                </div>
                @for($i=1; $i<=10; $i++)
                    <div class="control-group">
                        <label class="control-label">Image Detail {!! $i !!}</label>
                        <div class="controls">
                            <input type="file" name="fProductDetail[]" />
                        </div>
                    </div>
                @endfor
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Product Add</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
