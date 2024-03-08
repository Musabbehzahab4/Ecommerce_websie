<x-layout.Homelayout>

    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex flex-row w-100 gap-3 mt-4">
                {{-- <div class="row"> --}}
                @foreach ($orderdetail as $value)
                <div class="card p-4" id="card-1">
                        <p>Name : <b>{{ $value->name }}</b></p>
                        <p>Price : <b>{{ $value->price }}</b></p>
                        <p>Quantity : <b>{{ $value->quantity }}</b></p>
                        <img src="/students/{{ $value->image }}" class="rounded" width="50%">
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

</x-layout.Homelayout>
