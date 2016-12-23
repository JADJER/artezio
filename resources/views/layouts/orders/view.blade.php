@extends('layouts/app')

@section('style')
    <link href="{{ url('/') }}/assets/css/bootstrap-sortable.css" rel="stylesheet">
@endsection

@section('script')
    <script type="text/javascript" src="{{ url('/') }}/assets/js/bootstrap-sortable.js"></script>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Ваши заявки</div>
    <div class="panel-body">
    @if (count($orders) === 0)
       Нет заявок
    @else
        <table class="table table-bordered table-striped sortable">
            <thead>
            <tr>
                <td>№ п/п</td>
                <th data-defaultsign="_19">Номер заявки</th>
                <th data-defaultsign="month">Дата заявки</th>
                <th data-defaultsign="AZ">Статус ЭД</th>
                <td>Тип заявки</td>
                <td title="Подтисать">П</td>
                <td title="Редактировать">Р</td>
                <td title="Удалить">У</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td data-value="{{ $loop->index + 1 }}">{{ $loop->index + 1 }}</th>
                    <td>{{ "2-" . str_pad($order->order_no, 7, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td data-dateformat="DD-MM-YYYY">{{ $order->order_type }}</td>
                    <td title="Подтисать"><button class="btn btn-success"@if($order->isSigned || $order->isDeleted) disabled @endif></button></td>
                    <td title="Редактировать"><button class="btn btn-warning"@if($order->isSigned || $order->isDeleted) disabled @endif></button></td>
                    <td title="Удалить"><button class="btn btn-danger"@if($order->isSigned || $order->isDeleted) disabled @endif></button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection