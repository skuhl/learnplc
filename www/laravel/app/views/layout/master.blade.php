<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-31266232-3', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') }}
            <!-- Custom styles for this template -->
    {{ HTML::style('/public/assets/css/style.css') }}

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('//code.jquery.com/jquery-2.1.1.js') }}
            <!-- Latest compiled and minified JavaScript -->
    {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}

    @yield('additionalCSS')

    <title>
        @yield('title','PLC')
    </title>

    <!-- Stick Footer CSS -->
    <style media='screen' type='text/css'>

        * {
            margin: 0;
        }

        html, body {
            height: 100%;
        }

        .wrapper {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -100px;
            background-color: #e4e3d5;
        }

        .footer, .push {
            height: 100px;
        }

        /* Absolute Center CSS Spinner */
        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 1500ms infinite linear;
            -moz-animation: spinner 1500ms infinite linear;
            -ms-animation: spinner 1500ms infinite linear;
            -o-animation: spinner 1500ms infinite linear;
            animation: spinner 1500ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

    </style>

</head>

<body>

<!-- Nav Bar -->

<div class='useless'>
</div>

<div class='wrapper'>
    <div class="div-color-light">
        <div class="header">
            <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li> {{ HTML::link('account/register', 'Help') }} </li>
                    <!-- Drop down to display if user is logged in -->
                    @if(Auth::check())
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#">{{Auth::user()->email}} <b class="caret"></b> </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><a href="{{ URL::to('user/profile') }}">My Progress</a></li>
                                @if(Auth::user()->isInstructor())
                                    <li><a href="{{ URL::to('courses') }}">My Courses</a></li>
                                @endif
                                <li><a href="{{ URL::to('account/info') }}">My Account Info</a></li>
                                <li role="presentation" class="divider"></li>
                                <li><a>
                                        {{ Form::open(array('url'=>'account/logout')) }}
                                        {{ Form::submit('Log out', array('id'=>'dropdown-logout', 'class'=>'btn btn-link', 'onclick'=>'submit();'))}}
                                        {{ Form::close() }}
                                    </a></li>
                            </ul>
                        </li>
                        @else
                                <!-- Drop down to display if user is not logged in -->
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#">Sign In<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <div class="modal-body">

                                    <!-- Login box -->
                                    {{ Form::open(array('url'=>'account/login')) }}
                                    <div class="div-color-dark">
                                        <div class="form col-md-12 center-block text-center">
                                            <div class="form-group">
                                                {{ Form::text('email', null, array('class'=>'form-control input', 'placeholder'=>'Email Address')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::password('password', array('class'=>'form-control input', 'placeholder'=>'Password')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::submit('Log In', array('id'=>'dropdown-login', 'class'=>'btn btn-large btn-primary btn-block', 'onclick'=>'submit();'))}}
                                            </div>
                                            <div class="form-group">
                                                {{ HTML::link('account/register', 'New? Register Here') }} <br/>
                                                {{ HTML::link('account/recover', 'Forgot password?') }}
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                                <!-- end login box -->
                                    </div>
                            </ul>
                        </li>
                    @endif
                </ul>
                <a href="{{URL::to('modules')}}"><h3 class="title"><strong>LearnPLC</strong></h3></a>
            </div>
        </div> <!-- end Container -->
    </div><!-- End Nav Bar -->


    <!-- Content -->
    @yield('content')
            <!-- End Content -->
    <div class="push"></div>
    <div id="loading" class="loading">Loading&#8230;</div>
</div> <!-- Wrapper -->

<!-- Footer -->
<div class="footer" style="padding: 13px">
    <div class="container" style="margin: auto">
        <div class="row">
            <div class="col-lg-6" style=" font-size: 8px; width: 780px;">
                <p>- This workforce solution was funded by a grant awarded by the U.S.
                    Department of Labor’s Employment and Training Administration. The solution was created by the grantee and
                    does not necessarily reflect the official position of the U.S. Department of Labor. The U.S. Department of
                    Labor makes no guarantees, warrantees, or assurances of any kind, express or implied, with respect to
                    such information, including any information on linked sites and including, but not limited to, accuracy of
                    the information or its completeness, timeliness, usefulness, adequacy, continued availability, or ownership.<br>
                    - The eight community colleges and M-CAM is an equal opportunity employer/program provider.
                    Auxiliary aids and services are available upon request to individuals with disabilities.
                    TTY users please call 1-877-878-8464 or visit <a href="https://www.michigan.gov/mdcr">www.michigan.gov/mdcr</a>.<br>
                    - This work is licensed under a Creative Commons Attribution 4.0 International License.
                    <a href="https://creativecommons.org/licenses/by/4.0/">https://creativecommons.org/licenses/by/4.0/</a></p>
            </div>
            <div class="col-lg-6 text-right" style="width: 250px"><p><a href="{{ URL::to('about') }}">ABOUT</a>{{-- | <a
                            href="{{URL::to('contact') }}">CONTACT US</a>--}}</p></div>
        </div>
        {{--<div class="row">--}}
        {{--<div class='col-lg-6'></div>--}}
        {{--<div class='col-lg-6 text-right'style="width: 250px">--}}
        {{--<a href="{{ URL::to('account/account-types') }}">LearnPLC For Your Classroom</a>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<!-- End Footer -->

<!-- Scripts -->
@yield('script')
<script type="text/JavaScript">
    $(function () {
        $('#loading').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            beforeSend: function () {
                $('#loading').show();
            },
            error: function () {
                alert("There was an error processsing your request");
            },
            complete: function () {
                $('#loading').delay(200).fadeOut();
            }
        });
    });
</script>


</body>

</html>