@extends('admin.master')
@section('classcate')
    active
@endsection
@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Category Edit</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{!! route('admin.cate.postEdit',$data['id']) !!}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="control-group">
                    <label class="control-label">Category Parent</label>
                    <div class="controls">
                        <select name="sltParent">
                            <option value="0">Please Choose Category</option>
                            <?php cate_parent($parent,0,"--",$data['parent_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Name</label>
                    <div class="controls">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li class="alert alert-danger">{{$error}}</li>
                            @endforeach
                        @endif
                        <input type="text" name="txtCateName" class="span11" value="{!! old('txtCateName', isset($data)?$data['name']:'') !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Order</label>
                    <div class="controls">
                        <input type="text" name="txtOrder" class="span11" value="{!! old('txtOrder', isset($data)?$data['order']:'') !!}"  />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Keywords</label>
                    <div class="controls">
                        <input type="text" name="txtKey" class="span11" value="{!! old('txtKey', isset($data)?$data['keywords']:'') !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Description</label>
                    <div class="controls">
                        <input type="text" name="txtDes" class="span11" value="{!! old('txtDes', isset($data)?$data['description']:'') !!}"/>
                        <span class="help-block">Description field</span> </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-info"><a href="{!! route('admin.cate.getList') !!}">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>
@endsection
