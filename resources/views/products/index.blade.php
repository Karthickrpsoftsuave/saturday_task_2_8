<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <form method="post" action="{{route('product.create')}}">
                            @csrf
                            @method('get')
                            <button type="submit" value="Delete">ADD</button>
                        </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a href="{{route('product.edit',['product'=>$product])}}">Edit</a></td>
                    <td>
                        <form method="post" action="{{route('product.delete',['product'=>$product])}}">
                            @csrf
                            @method('delete')
                            <button type="submit" value="Delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
