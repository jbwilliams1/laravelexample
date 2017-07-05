<div class="clearfix"></div>
<footer role="footer">
    <div class="container container-row">
        <div class="footer-contact-info col-md-3">
    
        </div>
        <div class="col-md-3">
            <h4 class="footer-title">Upcoming Events</h4>
            <ul class="events-list">
            @if (!$events->isEmpty())
                @foreach ($events as $event)
                    <li>
                        <span class="event-date">{{date('m/d/Y', strtotime($event->date))}} at {{date('h:s a', strtotime($event->time))}}</span> <br> {{$event->name}}
                    </li>
                @endforeach
            @else
                <li>No upcoming events</li>
            @endif
            </ul>
        </div>
        <div class="footer-social-media col-md-2 col-md-offset-1">
            <h4 class="footer-title">Social Media</h4>
            <ul class="social-media-list">
                <li class="facebook"><a href=""><i class="fa fa-facebook-square"></i> facebook <i class="fa fa-arrow-circle-o-right arrow"></i></a></li>
                <li class="twitter"><a href=""><i class="fa fa-twitter"></i> twitter <i class="fa fa-arrow-circle-o-right arrow"></i></a></li>
                <li class="instagram"><a href=""><i class="fa fa-instagram"></i> instagram <i class="fa fa-arrow-circle-o-right arrow"></i></a></li>
            </ul>
        </div>
        <div class="footer-pages-list col-md-1 col-md-offset-2" >
            <h4 class="footer-title">Site Map</h4>
            <ul class="pages-list">
                <li><a class="@if (Route::currentRouteName() == 'home')active @endif" href="/" class="active">Home</a></li>
                <li><a class="@if (Route::currentRouteName() == 'about')active @endif" href="/about">About</a></li>        
                <li><a class="@if (Route::currentRouteName() == 'contact')active @endif" href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4372611-2', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
