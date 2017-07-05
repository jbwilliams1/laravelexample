@extends('layouts.admin.adminMaster')

@section('content')
    <h3>Admin Dashboard </h3>
    <hr>
    <br><br>
    <div id="timeline-chart"></div>
    <section style="cursor:pointer" id="auth-button"></section>

    <!-- This admin dashboard just shows your recent google analytics activity, if you set it up -->
    <script>
        (function(w,d,s,g,js,fjs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
            js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
        }(window,document,'script'));
    </script>
    <script>
        gapi.analytics.ready(function() {
            var CLIENT_ID = '';
            
            gapi.analytics.auth.authorize({
                container: 'auth-button',
                clientid: CLIENT_ID,
            });
            var timeline = new gapi.analytics.googleCharts.DataChart({
                reportType: 'ga',
                query: {
                    'ids'       : 'ga:11276454',
                    'dimensions': 'ga:date',
                    'metrics': 'ga:sessions',
                    'start-date': '30daysAgo',
                    'end-date': 'yesterday',
                },
                chart: {
                    type: 'LINE',
                    container: 'timeline-chart',
                    options : {
                        title: "Activity in the last 30 days",
                        width: '100%',
                        backgroundColor: '#F9F9F9'
                    }
                }
            });

            timeline.execute();
        });
    </script>
@stop