@extends('admin.master')
@section('classcate','active')
@section('content')
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Data Category</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                    <tr class="gradeX">
                        <td>{!! $value['id'] !!}</td>
                        <td>{!! $value['name'] !!}</td>
                        <td>
                            @if($value['parent_id'] == 0)
                                {!! "None" !!}
                            @else
                            <?php
                                $parent=DB::table('cates')->where('id',$value["parent_id"])->first();
                                echo $parent->name;
                            ?>
                                @endif
                        </td>
                        <td class="center"><i class="fa fa-trash"><a onclick="return confirmdel('Are you sure?')" href="{!! route('admin.cate.getDelete',$value['id']) !!}">Delete</a></i></td>
                        <td class="center"><i class="fa fa-pencil"><a href="{!! route('admin.cate.getEdit',$value['id']) !!}">Edit</a></i></td>
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
