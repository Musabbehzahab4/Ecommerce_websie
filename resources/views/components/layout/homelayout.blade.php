<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-admin.style />

    <title>Ecommerce</title>
    {{isset($CustomCSS)?$CustomCSS:''}}
</head>
<x-admin.header />
<body style="background: linear-gradient(#141e30, #141e30);">


  {{ $slot }}

</body>
<x-admin.script />
{{ isset($CustomJS)?$CustomJS:'' }}
{{-- {{ isset($Ajax)?$Ajax:'' }} --}}

</html>
