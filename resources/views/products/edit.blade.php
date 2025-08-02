<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>update a product</h1>
    <form method="post" action="{{route('product.update',['product'=>$product])}}">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$product->name}}"><br><br>
        <label for="price">Price</label>
        <input type="price" name="price" value="{{$product->price}}"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>