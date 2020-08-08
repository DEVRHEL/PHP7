@extends('admin.master')
@section('classuser','active')
@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Users</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>2FA Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $value)
                    <tr class="gradeX">
                        <td>{!! $value['id'] !!}</td>
                        <td>{!! $value['username'] !!}</td>
                        <td>
                            {!! $value['id']==2?"Superadmin":($value['level']==1?"Admin":"Member") !!}
                        </td>
                        <td>{!! is_null($value['secret_code'])?"Disabled":"Enabled" !!}</td>
                        <td class="center"><i class="fa fa-trash"><a onclick="return confirmdel('Are you sure?')" href="{!! route('admin.user.getDelete',$value['id']) !!}">Delete</a></i></td>
                        <td class="center"><i class="fa fa-pencil"><a href="{!! route('admin.user.getEdit',$value['id']) !!}">Edit</a></i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{url('public/admin/js/jquery.min.js')}}"></script>
    {{--<script src="{{url('public/admin/js/jquery.ui.custom.js')}}"></script>--}}
    {{--<script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>--}}
    {{--<script src="{{url('public/admin/js/jquery.uniform.js')}}"></script>--}}
    <script src="{{url('public/admin/js/select2.min.js')}}"></script>
    {{--<script src="{{url('public/admin/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{url('public/admin/js/matrix.js')}}"></script>--}}
    <script src="{{url('public/admin/js/matrix.tables.js')}}"></script>
    <script src="{{url('public/admin/js/myscript.js')}}"></script>

@endsection
