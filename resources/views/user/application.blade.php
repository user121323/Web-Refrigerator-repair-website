@extends("layouts.master")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-2">
            @if(session()->exists("user"))
            <form action="/sendapplication" method="post">
                <div class="form-froup mt-5">
                    <label>{{ __("sendrequest.label_street") }}</label>
                    <input type="text" name="street" required class="form-control">
                </div>
                <div class="form-froup">
                    <label>{{ __("sendrequest.label_house_number") }}</label>
                    <input type="text" name="housenumber" required class="form-control">
                </div>
                <button class="btn btn-primary mt-3">{{__("homepage.btn_send")}}</button>
            </form>
            @else
                <div class="alert alert-warning mt-5" role="alert">
                    {{ __("sendrequest.alert_for_send_application") }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
