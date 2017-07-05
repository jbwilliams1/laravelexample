<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$page_title or 'Web Application'}}</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css"/>
    <link href="/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet"  type="text/css"/>
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

    <script src="/js/bxslider/jquery.bxslider.min.js"></script>
    <script src="/js/script.js?v=2"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>