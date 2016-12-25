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
    <tr>
        <td>Инкассаторская услуга</td>
        <td><a href="/handbook/edit/collector_service">Редактировать</a></td>
    </tr>
    <tr>
        <td>Тип заявки на инкассацию</td>
        <td><a href="/handbook/edit/order_type">Редактировать</a></td>
    </tr>
    <tr>
        <td>Способ сдачи денежной наличности</td>
        <td><a href="/handbook/edit/method_delivery">Редактировать</a></td>
    </tr>
    <tr>
        <td>Периодичность оказания инкассаторских услуг</td>
        <td><a href="/handbook/edit/frequency_collectors">Редактировать</a></td>
    </tr>
    <tr>
        <td>Код валют</td>
        <td><a href="/handbook/edit/cash_code">Редактировать</a></td>
    </tr>
    </tbody>
</table>
@endsection