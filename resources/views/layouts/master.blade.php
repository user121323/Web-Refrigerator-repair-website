<!doctype html>
<html lang="en">
<head>
    <title>Ремонт холодильников Алматы</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ $styles }}">
    <!-- CSS -->
    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<!--Header-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-9">
                <ul class="nav" style="margin-left: -10%">
                    <li class="nav-item">
                        <a class="nav-link" href="/" style="color: white">{{__('homepage.header_main')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services" style="color: white">{{__('homepage.header_service')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contacts" style="color: white">{{__('homepage.header_contacts')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/feedback" style="color: white">{{__('homepage.header_feedback')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sendrequest" style="color: white">{{__('homepage.header_send_request')}}</a>
                    </li>
                    @if(session()->exists('user') && session()->get("user")->isadmin==1)
                    <li class="nav-item">
                        <a class="nav-link" href="/admin" style="color: white">{{__('homepage.header_adminpage')}}</a>
                    </li>
                    @endif
                    @if(session()->exists('user'))
                        <li class="nav-item">
                            <a class="nav-link" href="/profile" style="color: white">{{__('homepage.header_profile')}}</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col">
                <ul class="nav" style="margin-left: 20%">
                    <li class="nav-item">
                        <form action="locale" method="get">
                            <select class="nav-link" onchange="this.form.submit()" name="loc">
                                <option>{{ $current_locale->name }}</option>
                                @foreach($languages as $l)
                                    <option value="{{$l->code}}">{{ $l->name }}</option>
                                @endforeach
                            </select>
                        </form>

                    </li>
                    <li class="nav-item">
                        @if(session('user') == null)
                            <button class="nav-link" data-toggle="modal" data-target="#loginModal">{{__('homepage.btn_login')}}</button>
                            <!-- Modal -->
                            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{__('homepage.btn_authorization')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/login" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">{{__('homepage.label_login')}}</label>
                                                @if(isset($_COOKIE["login"]) && isset($_COOKIE["password"]))
                                                    <input type="email" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $_COOKIE["login"] }}">
                                                @else
                                                    <input type="email" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">{{__('homepage.label_password')}}</label>
                                                @if(isset($_COOKIE["login"]) && isset($_COOKIE["password"]))
                                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{ $_COOKIE["password"] }}">
                                                @else
                                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                                @endif
                                            </div>
                                            <div class="form-group form-check">

                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
                                                <label class="form-check-label" for="exampleCheck1">{{__('homepage.label_rememberme')}}</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">{{__('homepage.btn_sigin')}}</button>
                                            <a href="/registration" class="btn btn-success">{{__('homepage.btn_registrations')}}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                            <form action="/logout" method="post">
                                <button class="nav-link">{{__('homepage.header_logout')}}</button>
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--Header-->

    @yield('content');


<!-- Footer -->
<footer class="text-white-50 bg-dark p-3" id="footer">

    <!-- Copyright -->
    <div class="text-center">© 2020 Copyright:
        <a href="../user/homepage.blade.php" class="text-white"> hol.kz</a>
    </div>


</footer>
<!-- Footer -->
</body>
</html>
