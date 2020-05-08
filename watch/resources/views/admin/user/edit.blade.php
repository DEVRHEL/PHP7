@extends('admin.master')
@section('classuser')
    active
@endsection
@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>User Edit</h5>
        </div>
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        @endif
        <div class="widget-content nopadding">
            <form action="{!! route('admin.user.postEdit',$id) !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" name="txtUsername" class="span11" placeholder="Please Enter Username" value="{!! $data->username !!}"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" name="txtPassword" class="span11" placeholder="Please Enter Password" value="{!! old('txtPassword') !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">RePassword</label>
                    <div class="controls">
                        <input type="password" name="txtRePassword" class="span11" placeholder="Please Enter Password" value="{!! old('txtRePassword') !!}" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" name="txtEmail" class="span11" placeholder="Please Enter Email" value="{!! $data->email !!}" />
                    </div>
                </div>
                @if(Auth::user()->id != $id)
                <div class="control-group">
                    <label class="control-label">Member Level</label>
                    <div class="controls">
                        <label>
                            <input type="radio" value="1" name="radios" />
                            Admin</label>
                        <label>
                            <input type="radio" value="3" name="radios" />
                            Member</label>
                    </div>
                </div>
                @endif
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">User Update</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
