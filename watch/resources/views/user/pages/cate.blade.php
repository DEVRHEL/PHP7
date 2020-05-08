@extends('user.master')
@section('linkTagHead')
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/categories.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/categories_responsive.css')!!}">
@endsection
@section('slider')
    @include('user.blocks.sliderCate')
@endsection
@section('product')
    <div class="products">
        <div class="container">

            <div class="row">
                <div class="col">

                    <!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{!! count($product_cate) !!}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        @foreach($product_cate as $item)
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
                    <div class="product_pagination">
                        <ul>
                            @if($product_cate->currentPage() != 1)
                            <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage()-1)) !!}">Prev</a></li>
                            @endif
                            @for($i=1; $i<= $product_cate->lastPage(); $i++)
                            <li class="{!! ($product_cate->currentPage() == $i)? 'active' :'' !!}"><a href="{!! str_replace('/?','?',$product_cate->url($i)) !!}">{!! $i !!}</a></li>
                            @endfor
                            @if($product_cate->currentPage() != $product_cate->lastPage())
                            <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage()+1)) !!}">Next</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('iconboxes')
    @include('user.blocks.iconboxes')
@endsection
@section('newsletter')
    @include('user.blocks.newsletter')
@endsection
@section('addjs')
    <script src="{!! url('public/user/js/categories.js')!!}"></script>
    @endsection
