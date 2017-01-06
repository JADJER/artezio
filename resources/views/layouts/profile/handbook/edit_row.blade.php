@extends('layouts/app')

@section('style')
@endsection

@section('script')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <form id="edit_row" method="POST">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped sortable">
            <thead>
            <tr>
                <td>id</td>
                <td>Наименование</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" name="id" value="{{ $handbook->id }}" disabled></td>
                <td><input type="text" name="name" value="{{ $handbook->name }}"></td>
            </tr>
            <tr>
                <td><a href="/handbook/edit/{{ $key }}" class="btn btn-primary">Отмена</a></td>
                <td><button formaction="/handbook/edit/{{ $key }}/update/{{ $handbook->id }}" class="btn btn-primary">Сохранить</button></td>
            </tr>
            </tbody>
        </table>
    </form>
@endsection