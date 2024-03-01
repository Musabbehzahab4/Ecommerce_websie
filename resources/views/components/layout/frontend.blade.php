<!DOCTYPE html>
<html>
   <head>
    <x-frontend.style-user />
    {{-- {{ isset($custom_css)?$custom_css:'' }} --}}
   </head>
<body class="sub_page">
    {{ $slot }}


    {{ isset($custom_js)?$custom_js:'' }}

</body>
</html>
