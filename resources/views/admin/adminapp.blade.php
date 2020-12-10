@extends("layouts.adminmaster")

@section('content')

    <div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID пользователя</th>
                <th scope="col">Улица</th>
                <th scope="col">Дом</th>
                <th scope="col">Время отправки заявки</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $app)
                <tr>
                    <th>{{$app->id}}</th>
                    <td>{{$app->user_id}}</td>
                    <td>{{$app->street}}</td>
                    <td>{{$app->housenumber}}</td>
                    <td>{{$app->timeofapplication}}</td>
                    <td>
                        @if($app->done)
                            Выполнено
                        @else
                            <form action="/admin/doneapplication" method="post">
                                <button class="btn btn-primary" name="applicationid" value="{{ $app->id }}">Выполнить</button>
                            </form>
                        @endif
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
