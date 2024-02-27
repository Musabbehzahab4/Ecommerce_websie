<x-layout.Homelayout>

    @slot('CustomCSS')
    @endslot
<div class="container">
    <h1>Sub Category</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>SubCategory Name</th>
                <th>Category Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($subcategory as $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->category->title }}</td>
                <td>
                    <a href="{{ route('editsubcateg',['slug'=>$value->slug]) }}"class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('deletesubcateg',['slug'=>$value->slug]) }}"class="btn btn-danger btn-sm">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn">
        <a href="{{ route('subcategory-form') }}">ADD</a>
    </button>
</div>
</x-layout.Homelayout>
