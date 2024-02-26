<x-layout.Homelayout>

<div class="container">
    <h1>Category</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Size Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($size as $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <a href="{{ route('editsize',['id'=>$value->id]) }}"class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('deletesize',['id'=>$value->id]) }}"class="btn btn-danger btn-sm">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <button class="btn btn-primary" id="btn">
        <a href="{{ route('sizeform') }}">Add Size</a>
    </button>
</div>
</x-layout.Homelayout>
