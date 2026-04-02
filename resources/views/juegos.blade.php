<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Juegos</title>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="bg-light p-4 p-md-5 min-vh-100">
    <div class="container-xl d-flex gap-3 overflow-auto pb-4">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
    <x-footer />
  </div>
</body>
</body>
</html>
