<x-header />
<div class="container">
    <h1>Category</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Color Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($color as $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <a href="{{ route('editcolor',['id'=>$value->id]) }}"class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('deletecolor',['id'=>$value->id]) }}"class="btn btn-danger btn-sm">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn">
        <a href="{{ route('colorform') }}">Add color</a>
    </button>
</div>
</body>
</html>
