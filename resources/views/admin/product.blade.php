<x-layout.Homelayout>

<div class="container">
    <h1>Products</h1>
    <table style="width: 100%; margin-left: -6rem;">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Category</th>
                <th>SubCategory</th>
                <th>Brand</th>
                <th>Size</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>image</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($product as $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->Category->title }}</td>
                <td>{{ $value->Subcategory->title }}</td>
                <td>{{ $value->Brand->name }}</td>
                <td></td>
                <td></td>
                <td>{{ $value->quantity }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->image }}</td>

                <td>
                    <a href=""class="btn btn-primary btn-sm">Edit</a>
                    <a href=""class="btn btn-danger btn-sm">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn" style="margin-left: 55rem;">
        <a href="{{ route('productform') }}">Add Product</a>
    </button>
</div>
</x-layout.Homelayout>
