@extends('layouts/app')

@section('style')
    <link href="{{ url('/') }}/assets/css/bootstrap-sortable.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap-datetimepicker.min.css" />
    <script type="text/javascript" src="{{ url('/') }}/assets/js/bootstrap-sortable.js"></script>
    <script>
        $(document).ready(function() {
            $("#period").bind('change',
                function(){
                    var manuf_id = $(this).val();
                    if (manuf_id == 1)
                        $('#date_container').show();
                    else
                        $('#date_container').hide();
                });
            $('#date_1').datetimepicker(
                {pickTime: false, language: 'ru'}
            );
            $('#date_2').datetimepicker(
                {pickTime: false, language: 'ru'}
            );
        });
    </script>
@endsection

@section('script')

@endsection

@section('content')
    <div class="panel panel-default {{ $errors->has('start_date') || $errors->has('stop_date') ? ' has-error' : '' }}">
        <div class="panel-heading">Поиск</div>
        <div class="panel-body">
            <form id="search_form" action="{{ url('/search') }}" method="POST">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="period">
                                    Дата заявки
                                </label>
                                <select class="form-control" name="period" id="period" required>
                                    <option selected disabled> -- Выберите значение -- </option>
                                    <option value="1">За период</option>
                                    <option value="2">За текущую неделю</option>
                                    <option value="3">За текущий месяц</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">
                                    Статус
                                </label>
                                <select class="form-control" id="status" name="status">
                                @foreach($order_type as $ot)
                                <option value="{{ $ot->id }}">{{ $ot->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">
                                    Тип заявки
                                </label>
                                <select class="form-control" id="type" name="type">
                                @foreach($order_status as $os)
                                    <option value="{{ $os->id }}">{{ $os->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="date_container" class="row" style="display: none;">
                    <div class="col-md-6">
                        <div class="input-group date" id="date_1">
                            <label for="start_date">
                                Период с
                            </label>
                            <input id="start_date" title="ДД.ММ.ГГГГ" class="form-control" name="start_date" autofocus>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group date" id="date_2">
                            <label for="stop_date">
                                Период по
                            </label>
                            <input id="stop_date" title="ДД.ММ.ГГГГ" class="form-control" name="stop_date" autofocus>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-heading">
            <button id="singlebutton" form="search_form" name="singlebutton" class="btn btn-primary">Искать</button>
        </div>
    </div>
    @if($result != null)
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
        @foreach($result as $r)
            <tr>
                <td data-value="{{ $loop->index + 1 }}">{{ $loop->index + 1 }}</th>
                <td>{{ "2-" . str_pad($r->order_no, 7, '0', STR_PAD_LEFT) }}</td>
                <td data-dateformat="DD-MM-YYYY">{{ $r->order_date }}</td>
                <td>
                    @foreach($order_status as $os)
                        @if ($os->id == $r->order_status)
                            {{ $os->name }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $r->order_type }}
                    @foreach($order_type as $ot)
                        @if ($ot->id == $r->order_type)
                            {{ $ot->name }}
                        @endif
                    @endforeach
                </td>
                <td title="Подтисать"><a href="{{ ($r->order_status == 2) ? '' : url('/order/sign/' . $r->id) }}" class="btn btn-success"@if($r->isSigned || $r->isDeleted || $r->order_status == 2) disabled @endif></a></td>
                <td title="Редактировать"><a href="{{ url('/order/edit/' . $r->id) }}" class="btn btn-warning"@if($r->isSigned || $r->isDeleted) disabled @endif></a></td>
                <td title="Удалить"><a href="{{ url('/order/delete/' . $r->id) }}" class="btn btn-danger"@if($r->isSigned || $r->isDeleted) disabled @endif></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection