@extends("layouts.adminmaster")

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-sm-8 offset-2 mt-5">
            <form action="/admin/saveservice" method="post">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="name" class="form-control" value="{{ $service->name }}">
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Цена</label>
                    <input type="number" name="price" class="form-control" min="1" value="{{ $service->price }}">
                </div>
                <button class="btn btn-success" name="serviceid" value="{{ $service->id }}">Добавить</button>
            </form>
            <form action="/admin/deleteservice" method="post">
                <button class="btn btn-danger" name="serviceid" value="{{ $service->id }}">Удалить</button>
            </form>
        </div>
    </div>
</div>

@endsection
