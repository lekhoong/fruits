@extends('layouts.navbar_index')

    @section('content')
  
    <div class="juices">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">  
                        <h2>Our vegetables</h2>
                        <p>is a long established fact that a reader will be distracted by the readable content of a page when looking at</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="our_main_box">
                        <div class="our_img">
                            <figure><img src="{{ asset($product->image) }}" alt="#"/></figure>
                        </div>
                        <div class="our_text">
                            <input type="hidden" name="product_id" data-pid="{{ $product->id }}" value="{{ $product->id }}" >
                            <h4><strong class="yellow" data-price="10">{{ $product->price }}(100g)</strong></h4>
                            <h3>{{ $product->name }}</h3>
                            <a class="read_more" href="#" data-pid="{{ $product->id }}" data-price="{{ preg_replace('/[^0-9.]/', '', $product->price) }}" data-image="{{ asset($product->image) }}" data-product="{{ $product->name }}">Order Now</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
    <!-- end Our Juices section -->
    <!-- footer -->
    <script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script>
$(document).ready(function() {
    $('.read_more').on('click', function(event) {
    event.preventDefault();

    var price = $(this).data('price');
    console.log('Price:', price); // 检查输出的价格是否正确

    var image = $(this).data('image');
    var product = $(this).data('product');
    var pid = $(this).data('pid');
    
    // 创建并提交隐藏表单
    var form = $('<form action="{{ route('order') }}" method="POST"></form>');
    form.append('<input type="hidden" name="_token" value="{{ csrf_token() }}">');
    form.append('<input type="hidden" name="price" value="' + price + '">');
    form.append('<input type="hidden" name="image" value="' + image + '">');
    form.append('<input type="hidden" name="product" value="' + product + '">');
    form.append('<input type="hidden" name="product_id" value="'+pid+'">');
    $('body').append(form);
    form.submit();
});
});
</script>  
    