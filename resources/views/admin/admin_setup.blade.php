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
    <script src="/js/script.js"></script>
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
    <div class="tier-3 col-md-12 contact-info">
        <?php echo !empty($message) ? $message : ''; ?>
        <div class="container">
            <img src=""/> <h3>Welcome to the setup page! <br> <small>Create your new user account below</small></h3>
            <div class="row">
                <form method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required name="name" type="text" class="form-control" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required name="email" type="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required name="password" type="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input required name="password_confirmation" type="password" class="form-control" placeholder="Password"/>
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Log In</button>
                </form>
            </div>
        </div>
    </div>
</body>