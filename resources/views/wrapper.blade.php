<?php
/**
 * Created by PhpStorm.
 * User: matejpolak
 * Date: 06.11.17
 * Time: 16:18
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Your gift and goals sharing social network. Don't you know witch present you should buy to your friends? We have a solution for you, check Wishy!">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200, 600" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <title>@yield('title') | Wishy</title>
</head>
<body>
<!-- jQuery -->
<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>


@if(auth()->check())
<div class="container-fluid">
    <div class="row wishy-navbar">
        <div class="col-3 wishy-logo d-flex justify-content-around">
            <h1 class="text-uppercase mt-1"><a class="text-white" href="/">wishy</a></h1>
        </div>
        <div class="col-5 wishy-navbar-search">
            <form action="" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input id="search" type="text" class="form-control" name="search" placeholder="SEARCH...">
                </div>
            </form>
        </div>
        <div class="col-4 options">
            <div class="row d-flex justify-content-around text-center text-white">
                <a href="/" class="col-3 feed">
                    <p><i class="fa fa-rss" aria-hidden="true"></i></p>
                    <span>Feed</span>
                </a>
                <a href="#" class="col-3 notification">
                    <p><i class="fa fa-bell" aria-hidden="true"></i></p>
                    <span>Notifications</span>
                </a>
                <div class="dropdown">
                    <a href="#" class="col-3 user dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <p><i class="fa fa-user" aria-hidden="true"></i></p>
                        <span>Me</span>
                    </a>
                    <ul class="dropdown-menu text-black" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="/profile">
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@yield('content')

<!-- SCRIPTS -->
    <!-- BOOTSTRAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- FONTAWESOME -->
<script src="https://use.fontawesome.com/f1003c147a.js"></script>
<script src="/js/profile.js"></script>
</body>
</html>
