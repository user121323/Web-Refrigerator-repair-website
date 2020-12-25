@extends("layouts.master")

@section('content')

    <div id="div_send_request">
        <a href="/sendrequest" id="btn_send_request">
            <i class="fas fa-tools"></i> {{ __("contact.btn_sendapplication") }}
        </a>
    </div>
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-2">

                    @if (session()->get("user")!=null)
                        <form action="/sendfeedback" method="post" class="mb-5">
                            <div style="display: block">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>

                            <textarea class="form-control" name="comment" rows="5" placeholder="{{ __("feedback.label_youcomment") }}"></textarea>

                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-primary">{{ __("feedback.btn_send") }}</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info" role="alert">
                            {{ __("feedback.label_signin_for_leave_feedback") }}
                        </div>
                    @endif
                    @foreach($reviews as $review)
                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between">
                                @foreach($users as $user)
                                    @if($user->id == $review->user_id)
                                        <span class="mt-2">{{ $user->fullname }}</span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>
                                        {{ $review->comment }}
                                    </p>

                                    <div class="small mt-3">
                                        @for($i = 0; $i < $review->stars; $i++)
                                            <span class="fa fa-star" style="color:orange"></span>
                                        @endfor

                                        @for($i = $review->stars; $i < 5; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                    </div>

                                </blockquote>
                            </div>
                            <div class="card-footer text-muted">
                                {{ $review->wrotedate }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script type="text/javascript">
            if ($('#stars1').is(':checked')){
                {{ $newrating = 1 }}
            }
            else if ($('#stars2').is(':checked')){
                {{ $newrating = 2 }}
            }
            else if ($('#stars3').is(':checked')){
                {{ $newrating = 3 }}
            }
            else if ($('#stars4').is(':checked')){
                {{ $newrating = 4 }}
            }
            else if ($('#stars5').is(':checked')){
                {{ $newrating = 5 }}
            }


        </script>
    </section>
@endsection
