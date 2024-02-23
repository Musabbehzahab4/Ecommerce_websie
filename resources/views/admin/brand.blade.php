<x-header />

<div class="container">
    <h1>Brand</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Brand Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($brand as $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                     <a href="{{ route('editbrand',['id'=>$value->id]) }}"class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('deletebrand',['id'=>$value->id]) }}"class="btn btn-danger btn-sm">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn">
        <a href="{{ route('brandform') }}">Add Brand</a>
    </button>
</div>
</body>
</html>

