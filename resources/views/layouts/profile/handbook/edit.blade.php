@extends('layouts/app')

@section('style')
@endsection

@section('script')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <table class="table table-bordered table-striped sortable">
        <tbody>
        @foreach($handbook as $hb)
        <tr>
            <td>{{ $hb->id }}</td>
            <td>{{ $hb->name }}</td>
            <td><a href="/handbook/edit/{{ $key }}/edit/{{ $hb->id }}">Редактировать</a></td>
            <td><a href="/handbook/edit/{{ $key }}/delete/{{ $hb->id }}">Удалить</a></td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="/handbook/edit/{{ $key }}/add" class="btn btn-primary">Добавить</a></td>
        </tr>
        </tbody>
    </table>
@endsection