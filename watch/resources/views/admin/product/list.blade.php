@extends('admin.master')
@section('classproduct','active')
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
                    <th>Price</th>
                    <th>Category</th>
                    <th>Date</th>
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
                            {!! $value['price'] !!}
                        </td>
                        <td>
                            <?php
                                $catename=DB::table('cates')->where('id',$value["cate_id"])->first();
                                echo $catename->name;
                            ?>
                        </td>
                        <td>
                            <?php
                                echo \Carbon\Carbon::createFromTimestamp(strtotime($value['created_at']))->diffForHumans();
                            ?>
                        </td>
                        <td class="center"><i class="fa fa-trash"><a onclick="return confirmdel('Are you sure?')" href="{!! route('admin.product.getDelete',$value['id']) !!}">Delete</a></i></td>
                        <td class="center"><i class="fa fa-pencil"><a href="{!! route('admin.product.getEdit',$value['id']) !!}">Edit</a></i></td>
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
