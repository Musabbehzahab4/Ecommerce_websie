<x-header />

            <div class="login-box">
                <h2>{{ $title }}</h2>
                <form action="{{ $url }}" method="POST">
                    @csrf
                    <div class="user-box">
                        <input type="text" name="name" required value="{{ @$subcategory->title }}">
                        <label>name</label>
                    </div>
                    <div class="user-box">
                        <select name="category" id="">
                            <option value="">Selete Category</option>
                            @foreach ($category as $value)
                                <option value="{{ $value->id }}"@if ($value->id == @$subcategory->category_id) selected @endif>{{ @$value->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Add Subcategory
                    </button>
                </form>
            </div>

</body>
</html>
