<x-header />

            <div class="login-box">
                <h2>{{ $title }}</h2>
                <form action="{{ $url }}" method="POST">
                    @csrf
                    <div class="user-box">
                        <input type="text" name="name" required value="{{ @$category->title }}">
                        <label>name</label>
                    </div>
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Add category
                    </button>
                </form>
            </div>

</body>
</html>

