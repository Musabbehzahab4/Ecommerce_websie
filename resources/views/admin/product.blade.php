<x-header />

<div class="container">
    <h1>Products</h1>
    <table style="width: 100%; margin-left: -13rem;">
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
            {{-- @foreach ($category as $value) --}}

            <tr>
                {{-- <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>
                    <a href="{{ route('editcateg',['slug'=>$value->slug]) }}"class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('deletecateg',['slug'=>$value->slug]) }}"class="btn btn-danger btn-sm">Delete</a> --}}
                </td>

            </tr>
            {{-- @endforeach --}}

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn" style="margin-left: 55rem;">
        <a href="{{ route('productform') }}">Add Product</a>
    </button>
</div>
</body>
</html>
