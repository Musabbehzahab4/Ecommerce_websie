<x-layout.Homelayout>
<div class="login-box">
    <h2>{{ $title }}</h2>
    <form action="{{ $url }}" method="POST">
        @csrf
        <div class="user-box">
            <input type="text" name="name" required value="{{ @$color->name }}">
            <label>name</label>
        </div>
        <button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Add Color
        </button>
    </form>
</div>

</x-layout.Homelayout>
