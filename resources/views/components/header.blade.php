<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

    <title>Document</title>
</head>
<body style="background: linear-gradient(#141e30, #141e30);
">
    <nav class="navbar navbar-expand-lg py-4" style=" background: linear-gradient(#434344, #020305);
    ">
        <div class="container-fluid" id="nav">
          <a class="navbar-brand" href="{{ route('category') }}">Category</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Sub Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Brand</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Size</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Color</a>
              </li>
               <li class="nav-item">
                <a class="nav-link active" href="#">Product</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
