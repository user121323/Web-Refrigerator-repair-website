@extends("layouts.adminmaster")

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-2 mt-5">
            <h4 class="text-center">Добавить Сервис</h4>
            <form action="/admin/addservice" method="post">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Цена</label>
                    <input type="number" name="price" class="form-control" min="1">
                </div>
                <div class="form-group">
                    <label>Язык</label>
                    <select name="languageid" class="form-control">
                        @foreach($languages as $language)
                            <option value="{{$language->id}}">{{$language->name}} / {{ $language->code }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>
</div>
@endsection
