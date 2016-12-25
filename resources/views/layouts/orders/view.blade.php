@extends('layouts/app')

@section('style')
    <link href="{{ url('/') }}/assets/css/bootstrap-sortable.css" rel="stylesheet">
@endsection

@section('script')
    <script type="text/javascript" src="{{ url('/') }}/assets/js/bootstrap-sortable.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('content')


@if (count($orders) === 0)
<div class="panel panel-default">
    <div class="panel-heading">Ваши заявки</div>
    <div class="panel-body">
       Нет заявок
    </div>
</div>
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
            <td data-dateformat="DD-MM-YYYY">{{ $order->order_date }}</td>
            <td>
            @foreach($order_status as $os)
            @if ($os->id == $order->order_status)
                {{ $os->name }}
            @endif
            @endforeach
            </td>
            <td>
            @foreach($order_type as $ot)
            @if ($ot->id == $order->order_type)
                {{ $ot->name }}
            @endif
            @endforeach
            </td>
            <td title="Подтисать"><a href="{{ ($order->order_status == 2) ? '' : url('/order/sign/' . $order->id) }}" class="btn btn-success"@if($order->isSigned || $order->isDeleted || $order->order_status == 2) disabled @endif></a></td>
            <td title="Редактировать"><a href="{{ url('/order/edit/' . $order->id) }}" class="btn btn-warning"@if($order->isSigned || $order->isDeleted) disabled @endif></a></td>
            <td title="Удалить"><a href="{{ url('/order/delete/' . $order->id) }}" class="btn btn-danger"@if($order->isSigned || $order->isDeleted) disabled @endif></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
@endsection