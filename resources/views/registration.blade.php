@extends("layouts.master")

@section('content')
    <!--Section 1-->
    <section id="section1">
        <div class="container contactnumbers mt-4">
            <div class="row">
                <div class="col-sm link-to-home-page">
                    <a href="/">hol.kz</a>
                </div>
                <div class="col-sm">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <div class="phonenumbericon">
                                <i class="fas fa-phone-square-alt"></i>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="phonenumbertext">
                                <h5 id="phonenumberh1"><a href="">8 700 100 20 40</a></h5>
                                <label for="phonenumberh1" class="small">{{ __('homepage.label_callwetoday') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <div class="phonenumbericon">
                                <i class="fas fa-phone-square-alt"></i>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="phonenumbertext">
                                <h5 id="phonenumberh2"><a href="">8 700 100 20 40</a></h5>
                                <label for="phonenumberh2" class="small">{{ __('homepage.label_callwetoday') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Section 1-->


<section id="section2">
    <div class="container mb-5">
        <div class="row">
            <div class="col-sm-10 offset-1">

                <form class="mt-5" action="/registration" method="post">
                    <div class="form-group">
                        <label for="fullnameinput">{{ __('registration.label_fullname') }}</label>
                        <input class="form-control" type="text" name="fullname" id="fullnameinput">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('registration.label_login') }}</label>
                        <input type="email" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-text text-muted">{{ __('registration.label_create_username') }}</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ __('registration.label_password') }}</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">{{ __('registration.label_repassword') }}</label>
                        <input type="password" class="form-control" name="repassword" id="exampleInputPassword2">
                    </div>
                    <div class="form-group">
                        <label for="inputphonenumber">{{ __('registration.label_phone_number') }}</label>
                        <input type="tel" class="form-control" name="phonenumber" placeholder="8 700 123 45 67" pattern="[8]{1} [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" id="inputphonenumber">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="rememberme" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">{{ __('homepage.label_rememberme') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('homepage.btn_registrations') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
