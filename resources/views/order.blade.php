<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.order_design')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('layouts.order_design')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo_section">
                    <a href={{ route('juice') }}><img src="{{ asset('images/logo.png') }}" alt="back" /></a>
                </div>
            </div>
        </div>
    </header>
    <div class="order-container">
        <h1 class="text-center">{{ $product }}</h1>
        <img src="{{ $image }}" alt="image" class="product-img">

        <div class="price-weight">
            <p>Price: $<span id="price">{{ $price }}</span> / <span id="weight">100</span>g</p>
        </div>

        <form action="{{ route('finalOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="price" id="finalPrice" value="{{ $price }}">
            <input type="hidden" name="weight" id="finalWeight" value="100">
            <input type="hidden" name="image" value="{{ $image }}">

            <div class="weight-btns">
                <button type="button" class="btn btn-custom" id="addWeightButton">+100g</button>
                <button type="button" class="btn btn-custom" id="subtractWeightButton">-100g</button>
            </div>

            <button type="submit" class="btn btn-success btn-block">Buy Now</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var basePrice = {{ $price }};
            var currentWeight = 100;
            var priceElement = document.getElementById('price');
            var weightElement = document.getElementById('weight');
            var finalPriceInput = document.getElementById('finalPrice');
            var finalWeightInput = document.getElementById('finalWeight');

            // 增加重量按钮
            document.getElementById('addWeightButton').addEventListener('click', function() {
                currentWeight += 100;
                updatePriceAndWeight();
            });

            // 减少重量按钮
            document.getElementById('subtractWeightButton').addEventListener('click', function() {
                if (currentWeight > 100) {  // 最低限制100g
                    currentWeight -= 100;
                    updatePriceAndWeight();
                }
            });

            // 更新价格和重量的函数
            function updatePriceAndWeight() {
                var newPrice = (basePrice / 100) * currentWeight;

                // 更新显示的价格和重量
                priceElement.textContent = newPrice.toFixed(2);
                weightElement.textContent = currentWeight;

                // 更新隐藏表单字段的值
                finalPriceInput.value = newPrice.toFixed(2);
                finalWeightInput.value = currentWeight;
            }
        });
    </script>
</body>
</html>
