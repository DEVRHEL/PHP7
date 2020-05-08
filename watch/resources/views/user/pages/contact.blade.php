@extends('user.master')
@section('linkTagHead')
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/contact.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/contact_responsive.css')!!}">
@endsection
@section('slider')
    @include('user.blocks.sliderCate')
@endsection
@section('contact')
    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Get in touch -->
                <div class="col-lg-8 contact_col">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{Session::get('flash_message')}}
                        </div>
                    @endif
                    <div class="get_in_touch">
                        <div class="section_title">Get in Touch</div>
                        <div class="section_subtitle">Say hello</div>
                        <div class="contact_form_container">
                            <form action="{!! route('postContact') !!}" method="post" id="contact_form" class="contact_form">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="contact_name">Your Name*</label>
                                        <input name="name" type="text" id="contact_name" class="contact_input" required="required">
                                    </div>
                                </div>
                                <div>
                                    <label for="contact_textarea">Message*</label>
                                    <textarea name="message" id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
                                </div>
                                <button type="submit" class="button contact_button"><span>Send Message</span></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 offset-xl-1 contact_col">
                    <div class="contact_info">
                        <div class="contact_info_section">
                            <div class="contact_info_title">Marketing</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>yourmail@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Shippiing & Returns</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>yourmail@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Information</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>yourmail@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script src="{!! url('public/user/js/contact.js')!!}"></script>
@endsection
