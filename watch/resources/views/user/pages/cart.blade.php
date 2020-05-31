@extends('user.master')
@section('linkTagHead')
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/cart.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/cart_responsive.css')!!}">
@endsection
@section('slider')
    @include('user.blocks.sliderCate')
@endsection
@section('product')
    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>
            <form method="post" action="">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row cart_items_row">
                <div class="col">
                    <?php $total = 0; ?>
                    @foreach($content as $item)
                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div><img src="{!! asset('resources/upload/'.$item['attributes']->img) !!}" alt=""></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="#">{!! $item->name !!}</a></div>
                                <div class="cart_item_edit"><a href="{!! url('deletecart',['id'=>$item->id]) !!}">Remove Product</a></div>
                                <div class="cart_item_edit"><a class="myupdatecart" id="{!! $item->id !!}" href="#">Update Product</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">${!! $item->price !!}</div>
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                    <span>Qty</span>
                                    <input id="quantity_input" type="text" value="{!! $item->quantity !!}">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="cart_item_total">${!! $item->price*$item->quantity !!}<?php $total+= $item->price*$item->quantity?></div>
                    </div>
                    @endforeach
                </div>
            </div>
            </form>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="{!! url("/") !!}">Continue shopping</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="{!! url('clearcart') !!}">Clear cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{!! route('checkout') !!}" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row row_extra">
                <div class="col-lg-4">
                    <div class="coupon">
                        <div class="section_title">Your Phone Number</div>
                        <div class="section_subtitle">Enter your phone number</div>
                        <div class="coupon_form_container">
                            <input type="text" class="coupon_input" name="phonenumber" required="required">
                            <input type="hidden" name="user" value="{!! Auth::user()->username !!}">
                            <input type="hidden" name="email" value="{!! Auth::user()->email !!}">
                            <input type="hidden" name="cartval" value="@foreach($content as $item)Name: {!! $item->name !!} + Price: {!! $item->price !!} + Quantity: {!! $item->quantity !!};
                                @endforeach Total: {!! $total !!}">
                            <button class="button coupon_button"><span>Proceed to checkout</span></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Subtotal</div>
                                    <div class="cart_total_value ml-auto">${!! $total !!}</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Shipping</div>
                                    <div class="cart_total_value ml-auto">Free</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">${!! $total !!}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('addjs')
    <script src="{!! url('public/user/js/cart.js')!!}"></script>
    <script src="{!! url('public/user/js/myscript.js')!!}"></script>
@endsection
