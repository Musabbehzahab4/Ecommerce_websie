<x-layout.Homelayout>
    <div class="container">
        <h1>Order Table</h1>
        <table style="width: 100%; margin-left: -2rem;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Country</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $value)

                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->fname }}</td>
                    <td>{{ $value->lname }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->phone_no }}</td>
                    <td>{{ $value->country }}</td>
                    <td>$ {{ $value->total_price }}</td>
                    <td>{{ $value->status }}</td>
                    <td>
                        <a href="{{ route('detail',['id'=>$value->user_id]) }}" class="btn btn-primary btn-sm">Product Detail</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <button class="btn btn-primary" id="btn">
            <a href="{{ route('colorform') }}">Add color</a>
        </button> --}}
    </div>
    </x-layout.Homelayout>
