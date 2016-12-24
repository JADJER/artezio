@extends('layouts/app')

@section('style')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap-datetimepicker.min.css" />
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#date_1').datetimepicker(
                {pickTime: false, language: 'ru'}
            );
            $('#date_2').datetimepicker(
                {pickTime: false, language: 'ru'}
            );
            $('#time_1').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
            $('#time_1_1').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
            $('#time_1_2').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
            $('#time_2_1').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
            $('#time_2_2').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
            $('#time_3_1').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
            $('#time_3_2').datetimepicker(
                {pickDate: false, language: 'ru'}
            );
        });
        $(document).ready(function(){

            var i = 1;

            $('#add_service').click(function() {
                $('<div class="form-group">' +
                '<label for="time_up" class="col-md-4 control-label">' +
                    'Инкассаторская услуга' +
                '</label>' +
                '<div class="col-md-8">' +
                    '<input id="time_up" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="service_' + i + '" value="{{ old('time_up') }}" autofocus>' +
                '@if ($errors->has('time_up'))' +
                '<span class="help-block">' +
                    '<strong>{{ $errors->first('time_up') }}</strong>' +
                    '</span>' +
                        '@endif' +
                    '</div>' +
                    '</div>').fadeIn('slow').appendTo('.past_in');
                i++;
            });

            $('#remove').click(function() {
                if(i > 1) {
                    $('.field:last').remove();
                    i--;
                }
            });

            $('#reset').click(function() {
                while(i > 2) {
                    $('.field:last').remove();
                    i--;
                }
            });

            // here's our click function for when the forms submitted

            $('.submit').click(function(){

                var answers = [];
                $.each($('.field'), function() {
                    answers.push($(this).val());
                });

                if(answers.length == 0) {
                    answers = "none";
                }

                alert(answers);

                return false;

            });

        });

    </script>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Добавление обьекта собственности</div>
        <div class="panel-body">
            <form id="form_order" class="form-horizontal" role="form" method="POST" action="{{ url('/orders/edit') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Желательное время сдачи наличных (самостоятельно)/ время прибытия инкассаторов в организацию
                            </label>
                            <div class="col-md-6">
                                <div class="input-group date" id="time_1">
                                    <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('time_up'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('time_up') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('method_delivery') ? ' has-error' : '' }}">
                            <label for="order_type" class="col-md-6 control-label">
                                Способ сдачи денежной наличности
                            </label>
                            <div class="col-md-6">
                                <select id="method_delivery" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="method_delivery" autofocus>
                                    <option disabled selected value> -- Выберите значение -- </option>
                                    @foreach($method_delivery as $md)
                                        <option value="{{ $md->id }}">{{ $md->m_delivery }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('method_delivery'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('method_delivery') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Периодичность оказания инкассаторских услуг
                            </label>
                            <div class="col-md-6">
                                <select id="method_delivery" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="method_delivery" autofocus>
                                    <option disabled selected value> -- Выберите значение -- </option>
                                    @foreach($frequency_collector as $fc)
                                        <option value="{{ $fc->id }}">{{ $fc->freq_collectors }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('method_delivery'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('method_delivery') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                День недели
                            </label>
                            <div class="col-md-6">
                                <select id="method_delivery" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="method_delivery" autofocus>
                                    <option disabled selected value> -- Выберите значение -- </option>
                                    <option value="1">Понедельник</option>
                                    <option value="2">Вторник</option>
                                    <option value="3">Среда</option>
                                    <option value="4">Четверг</option>
                                    <option value="5">Пятница</option>
                                    <option value="6">Суббота</option>
                                    <option value="7">Воскресенье</option>
                                </select>
                                @if ($errors->has('method_delivery'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('method_delivery') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Предполагаемый объем денежной наличности для инкассации
                            </label>
                            <div class="col-md-6">
                                <input id="method_delivery" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="method_delivery" autofocus>
                                @if ($errors->has('method_delivery'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('method_delivery') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Код валюты
                            </label>
                            <div class="col-md-6">
                                <input id="method_delivery" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="method_delivery" autofocus>
                                @if ($errors->has('method_delivery'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('method_delivery') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Руководитель объекта
                            </label>
                            <div class="col-md-6">
                                <input id="method_delivery" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="method_delivery" autofocus>
                                @if ($errors->has('method_delivery'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('method_delivery') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Желательная дата начала обслуживания/Дата открытия торговой точки клиента
                            </label>
                            <div class="col-md-6">
                                <div class="input-group date" id="date_1">
                                    <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('time_up'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('time_up') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Рабочие дни</legend>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    с
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_1_1">
                                        <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_up'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_up') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    до
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_1_2">
                                        <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_up') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Суббота</legend>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    с
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_2_1">
                                        <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_up') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    до
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_2_2">
                                        <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_up') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Воскресенье</legend>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    с
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_3_1">
                                        <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_up') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    до
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_3_2">
                                        <input id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_up') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Адрес</legend>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    Тип адреса
                                </label>
                                <div class="col-md-6">
                                    <select id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <option selected value="1">01 – юридический адрес</option>
                                        <option value="2">02 – международный адрес</option>
                                        <option value="3">03 – фактический адрес (по умолчанию для случая, если юр. адрес уже есть в системе)</option>
                                        <option value="4">04  – почтовый адрес</option>
                                        <option value="5">05 – юридический адрес (ЕГРЮЛ/ЕГРИП)</option>
                                        <option value="6">06 – Адрес регистрации физлица</option>
                                        <option value="7">07 – Адрес фактического проживания физлица</option>
                                        <option value="8">08 – Адрес рождения физлица</option>S
                                    </select>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('time_up') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                                <label for="time_up" class="col-md-6 control-label">
                                    Тип населенного пункта
                                </label>
                                <div class="col-md-6">
                                    <select id="time_up" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        <option selected value="1">01 – город</option>
                                        <option value="2">02 – поселок</option>
                                        <option value="3">03 – село</option>
                                        <option value="4">04 – поселок городского типа</option>
                                        <option value="5">05 – станица</option>
                                        <option value="6">06 – аул</option>
                                        <option value="7">07 – рабочий поселок</option>
                                        <option value="8">08 – кордон</option>S
                                    </select>
                                    @if ($errors->has('time_up'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('time_up') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-4 control-label">
                                Наименование населенного пункта
                            </label>
                            <div class="col-md-8">
                                <input id="time_up" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                @if ($errors->has('time_up'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('time_up') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-4 control-label">
                                Улица
                            </label>
                            <div class="col-md-8">
                                <input id="time_up" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                @if ($errors->has('time_up'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time_up') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Номер дома (владение)
                            </label>
                            <div class="col-md-6">
                                <input id="time_up" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                @if ($errors->has('time_up'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('time_up') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Корпус (строение)
                            </label>
                            <div class="col-md-6">
                                <input id="time_up" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                @if ($errors->has('time_up'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('time_up') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <dic class="col-md-12">
                        <div class="list-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <a id="add_service" class="list-group-item active">Добавить услугу</a>
                            <div class="list-group-item past_in">
                                <div class="form-group">
                                    <label for="time_up" class="col-md-4 control-label">
                                        Инкассаторская услуга
                                    </label>
                                    <div class="col-md-8">
                                        <input id="time_up" type="text" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
                                        @if ($errors->has('time_up'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('time_up') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dic>
                </div>
            </form>
        </div>
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-10 col-md-2">
                    <div class="form-group">
                        <button id="singlebutton" form="form_order" name="singlebutton" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection