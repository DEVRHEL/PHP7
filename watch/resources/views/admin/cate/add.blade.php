@extends('admin.master')
@section('classcate')
    active
    @endsection
@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Category Add</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{!! route('admin.cate.postAdd') !!}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="control-group">
                    <label class="control-label">Category Parent</label>
                    <div class="controls">
                        <select name="sltParent">
                            <option value="0">Please Choose Category</option>
                            <?php cate_parent($parent); ?>
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
                        <input type="text" name="txtCateName" class="span11" placeholder="Please Enter Category Name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Order</label>
                    <div class="controls">
                        <input type="text" name="txtOrder" class="span11" placeholder="Please Enter Category Order"  />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Keywords</label>
                    <div class="controls">
                        <input type="text" name="txtKey" class="span11" placeholder="Please Enter Category Keywords" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Description</label>
                    <div class="controls">
                        <input type="text" name="txtDes" class="span11" />
                        <span class="help-block">Description field</span> </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Category Add</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
