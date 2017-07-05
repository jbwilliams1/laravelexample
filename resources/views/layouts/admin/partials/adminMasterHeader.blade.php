<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$page_title}}</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css"/>
    <link href="/css/main.css" rel="stylesheet" type="text/css"/>
@if (!empty($stylesheets))
    @foreach ($stylesheets as $css)
    <link href="{{$css}}" rel="stylesheet" type="text/css"/>
    @endforeach
@endif

    <script src="/js/jquery-2.1.3.min.js"></script>
@if (!empty($javascripts))
    @foreach ($javascripts as $js)
    <script src="{{$js}}"></script>
    @endforeach
@endif
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
</head>
<body class="admin">
