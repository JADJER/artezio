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

            var i = 2;

            $('#add_service').click(function() {
                $('<div class="form-group added_field">' +
                '<label for="service_' + i + '" class="col-md-4 control-label"> Инкассаторская услуга </label>' +
                '<div class="col-md-8">' +
                    '<select id="service_' + i + '" class="form-control" name="service_' + i + '" required autofocus>' +
                '<option disabled selected value> -- Выберите значение -- </option>' +
                '@foreach($collector_service as $cs)' +
                '<option value="{{ $cs->id }}">{{ $cs->name }}</option>' +
                        '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '</div>').fadeIn('slow').appendTo('.past_in');
                i++;
            });

            $('#remove').click(function() {
                if(i > 2) {
                    $('.added_field:last').remove();
                    i--;
                }
            });

            $('#reset').click(function() {
                while(i > 2) {
                    $('.added_field:last').remove();
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
            <form id="form_order" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/object/save/' . $id) }}">
                {{ csrf_field() }}
                <input type="hidden"  name="order_id" value="{{ $id }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
                            <label for="time_up" class="col-md-6 control-label">
                                Желательное время сдачи наличных (самостоятельно)/ время прибытия инкассаторов в организацию
                            </label>
                            <div class="col-md-6">
                                <div class="input-group date" id="time_1">
                                    <input id="time_up" title="ЧЧ:ММ" class="form-control" name="time_up" value="{{ old('time_up') }}" autofocus>
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
                            <label for="method_delivery" class="col-md-6 control-label">
                                Способ сдачи денежной наличности
                            </label>
                            <div class="col-md-6">
                                <select id="method_delivery" title="Предпочитаемый способ сдачи денежной наличности для инкассации." class="form-control" name="method_delivery" autofocus>
                                    <option {{ ($errors->has('method_delivery') && old('method_delivery') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                    @foreach($method_delivery as $md)
                                        <option value="{{ $md->id }}" {{ (old('method_delivery') == $md->id ) ? 'selected' : '' }}>{{ $md->name }}</option>
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
                        <div class="form-group{{ $errors->has('frequency_collectors') ? ' has-error' : '' }}">
                            <label for="frequency_collectors" class="col-md-6 control-label">
                                Периодичность оказания инкассаторских услуг
                            </label>
                            <div class="col-md-6">
                                <select id="frequency_collectors" title="Ежедневно/Рабочие дни/Через день/День недели/По заявке/По звонку" class="form-control" name="frequency_collectors" autofocus>
                                    <option {{ ($errors->has('frequency_collectors') && old('frequency_collectors') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                    @foreach($frequency_collector as $fc)
                                        <option value="{{ $fc->id }}" {{ (old('frequency_collectors') == $fc->id ) ? 'selected' : '' }}>{{ $fc->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('frequency_collectors'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('frequency_collectors') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('date_collectors') ? ' has-error' : '' }}">
                            <label for="date_collectors" class="col-md-6 control-label">
                                День недели
                            </label>
                            <div class="col-md-6">
                                <select id="date_collectors" title="День недели, выбираемый для оказания услуг по объекту инкассации" class="form-control" name="date_collectors" autofocus>
                                    <option {{ ($errors->has('frequency_collectors') && old('frequency_collectors') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                    <option value="1" {{ (old('date_collectors') == 1 ) ? 'selected' : '' }}>Понедельник</option>
                                    <option value="2" {{ (old('date_collectors') == 2 ) ? 'selected' : '' }}>Вторник</option>
                                    <option value="3" {{ (old('date_collectors') == 3 ) ? 'selected' : '' }}>Среда</option>
                                    <option value="4" {{ (old('date_collectors') == 4 ) ? 'selected' : '' }}>Четверг</option>
                                    <option value="5" {{ (old('date_collectors') == 5 ) ? 'selected' : '' }}>Пятница</option>
                                    <option value="6" {{ (old('date_collectors') == 6 ) ? 'selected' : '' }}>Суббота</option>
                                    <option value="7" {{ (old('date_collectors') == 7 ) ? 'selected' : '' }}>Воскресенье</option>
                                </select>
                                @if ($errors->has('date_collectors'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('date_collectors') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('count_cash') ? ' has-error' : '' }}">
                            <label for="count_cash" class="col-md-6 control-label">
                                Предполагаемый объем денежной наличности для инкассации
                            </label>
                            <div class="col-md-6">
                                <input id="count_cash" type="text" title="Сумма предназначенная клиентом к инкассации. М.б. как в рублях так и в ин. валюте" class="form-control" name="count_cash" value="{{ old('count_cash') }}" autofocus>
                                @if ($errors->has('count_cash'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('count_cash') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('cash_code') ? ' has-error' : '' }}">
                            <label for="cash_code" class="col-md-6 control-label">
                                Код валюты
                            </label>
                            <div class="col-md-6">
                                <select id="cash_code" title="Буквенный код валюты (в соответствии со стандартом ISO 4217)" class="form-control" name="cash_code" value="{{ old('cash_code') }}" autofocus>
                                    <option {{ ($errors->has('cash_code') && old('cash_code') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                    @foreach($cash_code as $cc)
                                        <option value="{{ $cc->id }}" {{ (old('cash_code') == $cc->id ) ? 'selected' : '' }}>{{ $cc->name }}</option>
                                    @endforeach
                                </select>
                                    @if ($errors->has('cash_code'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('cash_code') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('head_object') ? ' has-error' : '' }}">
                            <label for="head_object" class="col-md-6 control-label">
                                Руководитель объекта
                            </label>
                            <div class="col-md-6">
                                <input id="head_object" type="text" title="Контактный телефон руководителя точки юр. лица, по которой подразделение инкассации производит инкассацию" class="form-control" name="head_object" value="{{ old('head_object') }}" autofocus>
                                @if ($errors->has('head_object'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('head_object') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-6 control-label">
                                Желательная дата начала обслуживания/Дата открытия торговой точки клиента
                            </label>
                            <div class="col-md-6">
                                <div class="input-group date" id="date_1">
                                    <input id="start_date" title="ДД.ММ.ГГГГ" class="form-control" name="start_date" value="{{ old('start_date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('start_date') }}</strong>
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
                            <div class="form-group{{ $errors->has('time_job_start') ? ' has-error' : '' }}">
                                <label for="time_job_start" class="col-md-6 control-label">
                                    с
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_1_1">
                                        <input id="time_job_start" title="Начало работы объекта инкассации в рабочие дни" class="form-control" name="time_job_start" value="{{ old('time_job_start') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_job_start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_job_start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_job_stop') ? ' has-error' : '' }}">
                                <label for="time_job_stop" class="col-md-6 control-label">
                                    до
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_1_2">
                                        <input id="time_job_stop" title="Окончание работы объекта инкассации в рабочие дни" class="form-control" name="time_job_stop" value="{{ old('time_job_stop') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_job_stop'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_job_stop') }}</strong>
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
                            <div class="form-group{{ $errors->has('time_saturday_start') ? ' has-error' : '' }}">
                                <label for="time_saturday_start" class="col-md-6 control-label">
                                    с
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_2_1">
                                        <input id="time_saturday_start" title="Начало работы объекта инкассации в субботу" class="form-control" name="time_saturday_start" value="{{ old('time_saturday_start') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_saturday_start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_saturday_start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_saturday_stop') ? ' has-error' : '' }}">
                                <label for="time_saturday_stop" class="col-md-6 control-label">
                                    до
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_2_2">
                                        <input id="time_saturday_stop" title="Окончание работы объекта инкассации в субботу" class="form-control" name="time_saturday_stop" value="{{ old('time_saturday_stop') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_saturday_stop'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_saturday_stop') }}</strong>
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
                            <div class="form-group{{ $errors->has('time_sunday_start') ? ' has-error' : '' }}">
                                <label for="time_sunday_start" class="col-md-6 control-label">
                                    с
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_3_1">
                                        <input id="time_sunday_start" title="Начало работы объекта инкассации в воскресенье" class="form-control" name="time_sunday_start" value="{{ old('time_sunday_start') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_sunday_start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_sunday_start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_sunday_stop') ? ' has-error' : '' }}">
                                <label for="time_sunday_stop" class="col-md-6 control-label">
                                    до
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group date" id="time_3_2">
                                        <input id="time_sunday_stop" title="Окончание работы объекта инкассации в воскресенье" class="form-control" name="time_sunday_stop" value="{{ old('time_sunday_stop') }}" autofocus>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                    @if ($errors->has('time_sunday_stop'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time_sunday_stop') }}</strong>
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
                            <div class="form-group{{ $errors->has('address_type') ? ' has-error' : '' }}">
                                <label for="address_type" class="col-md-6 control-label">
                                    Тип адреса
                                </label>
                                <div class="col-md-6">
                                    <select id="address_type" title="Тип адреса объекта инкассации" class="form-control" name="address_type" autofocus>
                                        <option {{ ($errors->has('address_type') && old('address_type') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                        <option value="1" {{ (old('address_type') == 1 ) ? 'selected' : '' }}>01 – юридический адрес</option>
                                        <option value="2" {{ (old('address_type') == 2 ) ? 'selected' : '' }}>02 – международный адрес</option>
                                        <option value="3" {{ (old('address_type') == 3 ) ? 'selected' : '' }}>03 – фактический адрес (по умолчанию для случая, если юр. адрес уже есть в системе)</option>
                                        <option value="4" {{ (old('address_type') == 4 ) ? 'selected' : '' }}>04  – почтовый адрес</option>
                                        <option value="5" {{ (old('address_type') == 5 ) ? 'selected' : '' }}>05 – юридический адрес (ЕГРЮЛ/ЕГРИП)</option>
                                        <option value="6" {{ (old('address_type') == 6 ) ? 'selected' : '' }}>06 – Адрес регистрации физлица</option>
                                        <option value="7" {{ (old('address_type') == 7 ) ? 'selected' : '' }}>07 – Адрес фактического проживания физлица</option>
                                        <option value="8" {{ (old('address_type') == 8 ) ? 'selected' : '' }}>08 – Адрес рождения физлица</option>S
                                    </select>
                                    @if ($errors->has('address_type'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('address_type') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('type_settlement') ? ' has-error' : '' }}">
                                <label for="type_settlement" class="col-md-6 control-label">
                                    Тип населенного пункта
                                </label>
                                <div class="col-md-6">
                                    <select id="type_settlement" title="Тип населенного пункта, в котором находится объект инкассации" class="form-control" name="type_settlement" autofocus>
                                        <option {{ ($errors->has('type_settlement') && old('type_settlement') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                        <option value="1" {{ (old('type_settlement') == 1 ) ? 'selected' : '' }}>01 – город</option>
                                        <option value="2" {{ (old('type_settlement') == 2 ) ? 'selected' : '' }}>02 – поселок</option>
                                        <option value="3" {{ (old('type_settlement') == 3 ) ? 'selected' : '' }}>03 – село</option>
                                        <option value="4" {{ (old('type_settlement') == 4 ) ? 'selected' : '' }}>04 – поселок городского типа</option>
                                        <option value="5" {{ (old('type_settlement') == 5 ) ? 'selected' : '' }}>05 – станица</option>
                                        <option value="6" {{ (old('type_settlement') == 6 ) ? 'selected' : '' }}>06 – аул</option>
                                        <option value="7" {{ (old('type_settlement') == 7 ) ? 'selected' : '' }}>07 – рабочий поселок</option>
                                        <option value="8" {{ (old('type_settlement') == 8 ) ? 'selected' : '' }}>08 – кордон</option>S
                                    </select>
                                    @if ($errors->has('type_settlement'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('type_settlement') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name_settlement') ? ' has-error' : '' }}">
                            <label for="name_settlement" class="col-md-4 control-label">
                                Наименование населенного пункта
                            </label>
                            <div class="col-md-8">
                                <input id="name_settlement" type="text" title="Наименование населенного пункта, в котором находится объект инкассации" class="form-control" name="name_settlement" value="{{ old('name_settlement') }}" autofocus>
                                @if ($errors->has('name_settlement'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('name_settlement') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name_street') ? ' has-error' : '' }}">
                            <label for="name_street" class="col-md-4 control-label">
                                Улица
                            </label>
                            <div class="col-md-8">
                                <input id="name_street" type="text" title="Улица, по которой находится объект инкассации" class="form-control" name="name_street" value="{{ old('name_street') }}" autofocus>
                                @if ($errors->has('name_street'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name_street') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('house_no') ? ' has-error' : '' }}">
                            <label for="house_no" class="col-md-6 control-label">
                                Номер дома (владение)
                            </label>
                            <div class="col-md-6">
                                <input id="house_no" type="text" title="Номер дома (владение), в котором находится объект инкассации" class="form-control" name="house_no" value="{{ old('house_no') }}" autofocus>
                                @if ($errors->has('house_no'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('house_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('housing_no') ? ' has-error' : '' }}">
                            <label for="housing_no" class="col-md-6 control-label">
                                Корпус (строение)
                            </label>
                            <div class="col-md-6">
                                <input id="housing_no" type="text" title="Корпус (строение), в котором находится объект инкассации" class="form-control" name="housing_no" value="{{ old('housing_no') }}" autofocus>
                                @if ($errors->has('housing_no'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('housing_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <dic class="col-md-12">
                        <div class="list-group{{ $errors->has('services') ? ' has-error' : '' }}">
                            <div class="list-group-item active">Добавить услугу</div>
                            <h4 class="list-group-item-heading">
                                <a id="add_service" name="singlebutton" class="btn btn-primary">Добавить</a>
                                <a id="remove" name="singlebutton" class="btn btn-primary">Удалить</a>
                                <a id="reset" name="singlebutton" class="btn btn-primary">Очистить</a>
                            </h4>
                            <div class="list-group-item past_in">
                                <div class="form-group">
                                    <label for="service_1" class="col-md-4 control-label">
                                        Инкассаторская услуга
                                    </label>
                                    <div class="col-md-8">
                                        <select id="services" class="form-control" name="service_1" value="{{ old('service_1') }}" required autofocus>
                                            <option {{ ($errors->has('service_1') && old('service_1') != null ) ? '' : 'selected' }} disabled> -- Выберите значение -- </option>
                                            @foreach($collector_service as $cs)
                                            <option value="{{ $cs->id }}" {{ (old('service_1') == $cs->id ) ? 'selected' : '' }}>{{ $cs->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service_1'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('service_1') }}</strong>
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