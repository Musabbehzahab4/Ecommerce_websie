
<nav class="navbar navbar-expand-lg py-4" style=" background: linear-gradient(#434344, #020305);">
    <div class="container-fluid" id="nav">
      <a class="navbar-brand" href="{{ route('category') }}">Category</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('subcategory') }}">Sub Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('brand') }}">Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('size') }}">Size</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('color') }}">Color</a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" href="{{ route('product') }}">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('order') }}">Order Detail</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('front') }}">Front Site</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
