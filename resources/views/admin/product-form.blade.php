<x-layout.Homelayout>


    <div class="container"
        style="width: 50rem; background-color: #828989; margin-left: 51rem; margin-top: 38rem; border-radius: 10px;">
        <h2 style="text-align: center;font-size:3rem;">{{ $title }}</h2>
        <form action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputEmail4">
            </div>
            <div class="col-sm-3" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Category</label>
                <select class="form-select" name="category" id="category">
                    <option selected>Select Category</option>
                    @foreach ($category as $value)
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-3" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">SubCategory</label>
                <select class="form-select" name="subcategory" id="subcategory">
                    {{-- <option selected>Select SubCategory</option>
                @foreach ($subcategory as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @endforeach --}}
                </select>
            </div>


            <div class="col-sm-3" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Brand</label>
                <select class="form-select" name="brand">
                    <option selected>Select Brand</option>
                    @foreach ($brand as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-3" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Size</label>
                <select class="form-select" name="size[]" multiple="multiple" id="size">
                    
                    @foreach ($size as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-3" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Color</label>
                <select class="form-select" name="color[]" multiple="multiple" id="color">

                    @foreach ($color as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="inputEmail4">
            </div>


            <div class="col-md-6" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="inputEmail4">
            </div>


            <div class="col-md-6" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="inputEmail4">
            </div>


            <div class="col-md-6" style="width: 100%; margin-top: 20px;">
                <label for="inputEmail4" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="col-12">
                <a href="">
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px;">ADD PRODUCT</button>
                </a>
            </div>
        </form>
    </div>

    @slot('CustomJS')
        <script>
            $(document).ready(function() {
                $('#size').select2();
            });

            $(document).ready(function() {
                $('#color').select2();
            });
        </script>
    @endslot
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {


                $('#category').on('change', function() {
                    var idcategory = this.value;

                    $("#subcategory").html('');
                    $.ajax({
                        url: "{{ url('/ajaxcall') }}",
                        type: "get",
                        data: {
                            category: idcategory,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#subcategory').html('<option value="">Select subcategory</option>');
                            console.log(result);
                            $.each(result, function(key, value) {
                                $("#subcategory").append('<option value="' + value
                                    .id + '">' + value.title + '</option>');
                            });

                        }
                    });
                });
            })
        </script>
</x-layout.Homelayout>
