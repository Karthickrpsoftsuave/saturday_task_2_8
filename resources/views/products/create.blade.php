<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>create a product</h1>
    <form method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <label for="name">Name</label>
        <input type="text" name="name"><br><br>
        <label for="price">Price</label>
        <input type="price" name="price"><br><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>