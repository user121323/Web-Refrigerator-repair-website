@extends("layouts.adminmaster")

@section('content')

    <div class="container">
    <div class="row">
        <div class="card mb-3 mt-3">
            <div class="card-body">
                Добавить новый сервис
                <form action="/admin/addservice" method="get" style="display: inline">
                    <button class="btn btn-primary ml-3"><i class="fas fa-plus"></i></button>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Цена</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $ser)
                <tr>
                    <th>{{$ser->id}}</th>
                    <td>{{$ser->name}}</td>
                    <td>{{$ser->description}}</td>
                    <td>{{$ser->price}}</td>
                    <td>
                        <form action="/admin/detailservice" method="get">
                            <button class="btn btn-success" name="serviceid" value="{{ $ser->id }}">Детали</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
