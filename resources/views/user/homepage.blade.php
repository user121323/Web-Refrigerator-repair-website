@extends("layouts.master")

@section('content')
    <div id="div_send_request">
        <a href="/sendrequest" id="btn_send_request">
            <i class="fas fa-tools"></i> {{ __("contact.btn_sendapplication") }}
        </a>
    </div>
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

<!--Section 2-->
<section id="section2" style="background-image: url({{ asset('assets/img/freezerTopPagejpg.jpg') }});">
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                <div class="align-middle feature-items">
                    <ul>
                        <li><h4>{{ __('homepage.label_repairfreezer') }}</h4></li>
                        <li class="feature-item-li"><i class="fas fa-tools"></i> <span>{{ __('homepage.label_staticprice') }}</span></li>
                        <li class="feature-item-li"><i class="fas fa-tenge"></i> <span>{{ __('homepage.label_honestly') }}</span></li>
                        <li class="feature-item-li"><i class="far fa-clock"></i> <span>{{ __('homepage.label_bigexperience') }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section 2-->

<!--Section 3-->
<section class="mt-5" id="section3" style="background-image: url({{ asset('assets/img/freezersection2.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="callback p-4">
                    <div class="callbackheaderitem">
                        <h2>{{ __('homepage.label_questions') }}</h2>
                    </div>
                    <form id="callbackform" method="post" action="/sendquestion">
                      <div class="form-group">
                        <input type="text" class="form-control" id="formname" name="client_name" required placeholder="{{ __('homepage.label_name') }}" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                        <input type="tel" class="form-control" id="formphonenumber" name="phone_number" required placeholder="8 700 123 45 56"pattern="[8]{1} [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" required>
                        <small>{{ __("homepage.label_format_tel") }}: 8 700 123 45 56</small>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" id="formrequest" name="question_text" required placeholder="{{ __('homepage.label_squestion') }}" rows="4"></textarea>
                      </div>
                      <div class="row justify-content-center">
                            <button type="submit" class="btn btn-dark">{{ __('homepage.btn_send') }}</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section 3-->


<!--Section 4-->
<section id="section4" class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-1">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h2>{{ __('homepage.label_haveproblems') }}</h2>
                        <h6>{{ __('homepage.label_craftsmencan') }}</h6>
                    </div>
                    <div class="card-body bg-light">
                        <div class="services-items d-flex flex-wrap">
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_radiator') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_compressor') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_motor') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_thermostat') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_fan') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_refrigerator_evaporator') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_freon_leaks') }}</h5>
                            </div>
                            <div class="services-item text-center bg-white p-3 m-3">
                                <i class="fas fa-check"></i><br>
                                <h5>{{ __('homepage.label_know_frost') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section 4-->

<!--Section 5-->
<section class="mb-4" id="section5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <h4>{{ __('homepage.label_freezer_not_correct_work') }}</h4>
                <p> {{ __('homepage.label_section5_content_text_description') }}
                    <br><br><span class="symptoms_of_a_sick_fridge_freezer">{{ __('homepage.label_symptoms_of_incorrect_work_of_freezer') }}</span><br><br>
                    {{ __('homepage.label_symptoms_deffinition') }}

                    <a href="">8 700 123 12 12</a>.</p>
            </div>
            <div class="col-sm-6">
                <img src="https://storage.beko.co.uk/blomberg2018products/large/Blomberg_FridgeFreezer_KNM4551i_White_FrontOpen.jpg"
                     alt="Fridge Freezer">
            </div>
        </div>
    </div>
</section>
<!--Section 5-->

<!--Section 6-->
<section class="mb-4" id="section6">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <img src="https://dekoriko.ru/images/article/orig/2017/07/polki-dlya-holodilnika-56.jpg" alt="shelf of the refrigerator">
            </div>
            <div class="col-sm-6">
                <div class="zone_services">
                    <h2>{{ __('homepage.label_service_area') }}</h2>
                    <p>{{ __('homepage.label_service_area_definition') }}</p>
                    <p>{{ __('homepage.label_service_area_callme') }}<a href=""> 8 700 123 12 12 </a>, {{ __('homepage.label_service_area_leave_request') }}
                        <a href="">{{ __('homepage.label_text_here') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section 6-->

<!--Section 7-->
<section id="section7" class="mb-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10 offset-1">
                <h4 class="text-center">{{ __('homepage.label_freezer_brands_for_repair') }}</h4>
                <div class="brands d-flex flex-wrap">
                    <img src="https://i1.adis.ws/i/canon/canon-press-centre-canon-logo_301414581785538?w=550&qlt=100"
                         alt="canon">
                    <img src="data:image/png;base64,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" alt="samsung">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Philips_logo.svg" alt="philips">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Beko_2014_logo.png" alt="beko">
                    <img src="data:image/png;base64,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" alt="dyson">
                    <img src="https://cdn.worldvectorlogo.com/logos/delonghi.svg" alt="delonghi">
                    <img src="data:image/png;base64,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" alt="hotpoint">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/indesit-2-logo-svg-vector.svg" alt="indesit">
                    <img src="https://1000logos.net/wp-content/uploads/2019/08/Whirlpool-logo-2016%E2%80%93now.jpg" alt="whirlpool">
                    <img src="https://www.be-machinery.com/wp-content/uploads/Represantatives-logos-Siemens.jpg" alt="siemens">
                    <img src="https://cdn.worldvectorlogo.com/logos/logo-of-the-sharp-corporation.svg" alt="sharp">
                    <img src="data:image/jpeg;base64,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" alt="stoves">
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section 7-->
@endsection
