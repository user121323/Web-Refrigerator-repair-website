@extends("layouts.adminmaster")

@section('content')

    <div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fullname</th>
                <th scope="col">Login</th>
                <th scope="col">Phone number</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
            <tr>
                <th>{{$u->id}}</th>
                <td>{{$u->fullname}}</td>
                <td>{{$u->login}}</td>
                <td>{{$u->phonenumber}}</td>
                <td>
                    <form action="/admin/deleteuser" method="post">
                        <button class="btn btn-danger" name="userid" value="{{ $u->id }}">Удалить</button>
                    </form>
                </td>
            </tr>

              @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
