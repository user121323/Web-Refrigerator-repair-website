@extends("layouts.master")

@section('content')

    <div id="div_send_request">
        <a href="/sendrequest" id="btn_send_request">
            <i class="fas fa-tools"></i> {{ __("contact.btn_sendapplication") }}
        </a>
    </div>

    @if($result !=null && strcmp($result,"success")==0)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{__("profile.alert_success")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif($result !=null && strcmp($result,"invalidoldpasswrod")==0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{__("profile.alert_invalidoldpasswrod")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif($result !=null && strcmp($result,"newpasswordsnotmatch")==0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{__("profile.alert_newpasswordsnotmatch")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-1">
                    <div class="mb-5">
                        <h3>{{ __("profile.label_profule") }}</h3>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __("profile.label_fullname") }}</label>
                        <div class="d-flex">
                            <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->fullname }}">
                            <button class="btn btn-dark" data-toggle="modal" data-target="#editfullname"><i class="far fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="form-group" id="passwordshow">
                        <label for="exampleInputPassword1">{{ __("profile.label_phonenumber") }}</label>
                        <div class="d-flex">
                            <input readonly type="tel" class="form-control" id="exampleInputPassword1" value="{{ $user->phonenumber }}">
                            <button class="btn btn-dark"data-toggle="modal" data-target="#editphonenumber"><i class="far fa-edit"></i></button>
                        </div>
                    </div>

                    <form action="/editpassword" method="post" class="mt-5">
                        <input type="text" name="uid" value="{{ $user->id }}" hidden>
                        <div class="form-group">
                            <label>{{__("profile.label_oldpassword")}}</label>
                            <input type="password" class="form-control" name="oldpassword">
                        </div>
                        <div class="form-group">
                            <label>{{__("profile.label_newpassword")}}</label>
                            <input type="password" class="form-control" name="newpassword">
                        </div>
                        <div class="form-group">
                            <label>{{__("profile.label_newrepassword")}}</label>
                            <input type="password" class="form-control" name="newrepassword">
                        </div>

                        <div class="form control">
                            <button class="btn btn-dark">{{ __("profile.btn_edit") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="editfullname" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __("profile.label_editfullname") }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/editfullname" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="uid" value="{{ $user->id }}" hidden>
                                <label>{{ __("profile.label_fullname") }}</label>
                                <input name="fullname" type="text" class="form-control" aria-describedby="emailHelp" value="{{ $user->fullname }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("profile.btn_close") }}</button>
                            <button class="btn btn-primary">{{ __("profile.btn_edit") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editphonenumber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __("profile.label_editphonenumber") }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/editphonenumber" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="uid" value="{{ $user->id }}" hidden>
                                <label>{{ __("profile.label_fullname") }}</label>
                                <input name="phonenumber" type="tel" class="form-control" id="exampleInputPassword1" value="{{ $user->phonenumber }}"placeholder="8 700 123 45 67" pattern="[8]{1} [0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("profile.btn_close") }}</button>
                            <button class="btn btn-primary">{{ __("profile.btn_edit") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
