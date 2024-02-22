<x-header />

<div class="container">
    <h1>Category</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Category Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($category as $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>
                    <a href="{{ route('editcateg',['slug'=>$value->slug]) }}"class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('deletecateg',['slug'=>$value->slug]) }}"class="btn btn-danger btn-sm">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn">
        <a href="{{ route('category-form') }}">Add Category</a>
    </button>
</div>
