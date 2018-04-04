<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Default') | panel adminisrador</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/choosen/chosen.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css')}}">

</head>
<body>
@include('admin.template.partials.nav')
@include('flash::message');
<section >
    @yield('content')

    <footer></footer>


</section>

<script type="text/javascript" src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jquery/js/jquery-3.3.1.slim.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/choosen/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/trumbowyg/dist/trumbowyg.js')}}"></script>
@yield('js')
</body>
</html>