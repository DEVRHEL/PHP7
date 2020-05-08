@extends('user.master')
@section('linkTagHead')
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/main_styles.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/responsive.css')!!}">
    @endsection
@section('slider')
    @include('user.blocks.slider')
    @endsection
@section('ads')
    @include('user.blocks.ads')
@endsection
@section('product')
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product_grid">
                        @foreach($product as $item)
                        <!-- Product -->
                        <div class="product">
                            <div class="product_image"><img src="{!! url('resources/upload/'.$item->image)!!}" alt=""></div>
                            <div class="product_content">
                                <div class="product_title"><a href="{!! route('detail',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a></div>
                                <div class="product_price">${!! $item->price !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('ad')
    @include('user.blocks.ad')
@endsection
@section('iconboxes')
    @include('user.blocks.iconboxes')
@endsection
@section('newsletter')
    @include('user.blocks.newsletter')
@endsection
