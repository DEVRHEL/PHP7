@extends('user.master')
@section('linkTagHead')
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/product.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/product_responsive.css')!!}">
@endsection
@section('slider')
    @include('user.blocks.sliderCate')
@endsection
@section('productdetail')
    <div class="product_details">
       <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="{!! url('resources/upload/'.$product->image) !!}" alt=""></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            @foreach($product_img as $img)
                            <div class="details_image_thumbnail" data-image="{!! url('resources/upload/detail/'.$img->image) !!}"><img src="{!! url('resources/upload/detail/'.$img->image) !!}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{!! $product->name !!}</div>
                        <div class="details_price">${!! $product->price !!}</div>
                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                            @if($stock->order > 0)
                            <span>In Stock</span>
                            @else
                            <span>Out of Stock</span>
                            @endif
                        </div>
                        <div class="details_text">
                            {!! $product->intro !!}
                            {!! $product->content !!}
                        </div>

                        <!-- Product Quantity -->
                        @if($stock->order > 0)
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="button cart_button"><a href="#">Add to cart</a></div>
                        </div>
                        @endif
                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Description</div>
                    </div>
                    <div class="description_text">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('product')
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        @foreach($product_new as $item)
                        <!-- Product -->
                        <div class="product">
                            <div class="product_image"><img src="{!! url('resources/upload/'.$item->image) !!}" alt="{!! $item->alias !!}"></div>
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
@section('newsletter')
    @include('user.blocks.newsletter')
@endsection
@section('addjs')
    <script src="{!! url('public/user/js/product.js')!!}"></script>
@endsection
