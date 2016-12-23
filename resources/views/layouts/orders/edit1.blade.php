<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('swift') ? ' has-error' : '' }}">
            <label for="swift" class="col-md-6 control-label">
                GRID
            </label>
            <div class="col-md-6">
                <input id="swift" type="text" class="form-control" name="swift" value="{{ old('swift') }}" required autofocus>
                @if ($errors->has('swift'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('swift') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('time_up') ? ' has-error' : '' }}">
            <label for="time_up" class="col-md-6 control-label">
                Желательное время сдачи наличных (самостоятельно)/ время прибытия инкассаторов в организацию
            </label>
            <div class="col-md-6">
                <div class="input-group date" id="time_1">
                    <input id="time_up" type="text" title="ЧЧ:ММ" class="form-control" name="time_up" value="{{ old('time_up') }}" required autofocus>
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
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('method_delivery') ? ' has-error' : '' }}">
            <label for="method_delivery" class="col-md-6 control-label">
                Способ сдачи денежной наличности
            </label>
            <div class="col-md-6">
                <input id="method_delivery" list="method_delivery_list" type="text" title="Предпочитаемый способ сдачи денежной наличности для инкассации. " class="form-control" name="method_delivery" value="{{ old('method_delivery') }}" required autofocus>
                <datalist id="method_delivery_list" >
                    <option> Google
                    <option> IE9
                </datalist>
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
                <input id="frequency_collectors" list="frequency_collectors_list" type="text" title="Ежедневно/Рабочие дни/Через день/День недели/По заявке/По звонку" class="form-control" name="frequency_collectors" value="{{ old('frequency_collectors') }}" required autofocus>
                <datalist id="frequency_collectors_list" >
                    <option> Google
                    <option> IE9
                </datalist>
                @if ($errors->has('frequency_collectors'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('frequency_collectors') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('date_collectors') ? ' has-error' : '' }}">
            <label for="date_collectors" class="col-md-6 control-label">
                День недели
            </label>
            <div class="col-md-6">
                <select id="date_collectors" title="День недели, выбираемый для оказания услуг по объекту инкассации" class="form-control" name="date_collectors" value="{{ old('date_collectors') }}" required autofocus>
                    <option value="1">Понедельник</option>
                    <option value="2">Вторник</option>
                    <option value="3">Среда</option>
                    <option value="4">Четверг</option>
                    <option value="5">Пятница</option>
                    <option value="6">Суббота</option>
                    <option value="7">Воскресенье</option>
                </select>
                @if ($errors->has('date_collectors'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('date_collectors') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group{{ $errors->has('count_cash') ? ' has-error' : '' }}">
            <label for="count_cash" class="col-md-6 control-label">
                Предполагаемый объем денежной наличности для инкассации
            </label>
            <div class="col-md-6">
                <input id="count_cash" type="text" title="Сумма предназначенная клиентом к инкассации. М.б. как в рублях так и в ин. валюте" class="form-control" name="count_cash" value="{{ old('count_cash') }}" required autofocus>
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
                <input id="cash_code" type="text" title="Буквенный код валюты (в соответствии со стандартом ISO 4217)" class="form-control" name="cash_code" value="{{ old('cash_code') }}" required autofocus>
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
    <div class="col-md-8">
        <div class="form-group{{ $errors->has('head_object') ? ' has-error' : '' }}">
            <label for="head_object" class="col-md-6 control-label">
                Руководитель объекта
            </label>
            <div class="col-md-6">
                <input id="head_object" type="text" title="Контактный телефон руководителя точки юр. лица, по которой подразделение инкассации производит инкассацию" class="form-control" name="head_object" value="{{ old('head_object') }}" required autofocus>
                @if ($errors->has('head_object'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('head_object') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
            <label for="start_date" class="col-md-6 control-label">
                Желательная дата начала обслуживания/Дата открытия торговой точки клиента
            </label>
            <div class="col-md-6">
                <div class="input-group date" id="date_2">
                    <input id="start_date" type="text" title="ДД.ММ.ГГГГ" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                    <span class="input-group-addon">
                                                <span class="glyphicon-calendar glyphicon"></span>
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
            <div class="form-group{{ $errors->has('start_job_date') ? ' has-error' : '' }}">
                <label for="start_job_date" class="col-md-6 control-label">
                    с
                </label>
                <div class="col-md-6">
                    <div class="input-group date" id="time_1_1">
                        <input id="start_job_date" type="text" title="Начало работы объекта инкассации в рабочие дни" class="form-control" name="start_job_date" value="{{ old('start_job_date') }}" required autofocus>
                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                    @if ($errors->has('start_job_date'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('start_job_date') }}</strong>
                                                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('stop_job_date') ? ' has-error' : '' }}">
                <label for="stop_job_date" class="col-md-6 control-label">
                    по
                </label>
                <div class="col-md-6">
                    <div class="input-group date" id="time_1_2">
                        <input id="stop_job_date" type="text" title="Окончание работы объекта инкассации в рабочие дни" class="form-control" name="stop_job_date" value="{{ old('stop_job_date') }}" required autofocus>
                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                    @if ($errors->has('stop_job_date'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('stop_job_date') }}</strong>
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
            <div class="form-group{{ $errors->has('start_saturday_date') ? ' has-error' : '' }}">
                <label for="start_saturday_date" class="col-md-6 control-label">
                    с
                </label>
                <div class="col-md-6">
                    <div class="input-group date" id="time_2_1">
                        <input id="start_saturday_date" type="text" title="Начало работы объекта инкассации в субботу" class="form-control" name="start_saturday_date" value="{{ old('start_saturday_date') }}" required autofocus>
                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                    @if ($errors->has('start_saturday_date'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('start_saturday_date') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('stop_saturday_date') ? ' has-error' : '' }}">
                <label for="stop_saturday_date" class="col-md-6 control-label">
                    по
                </label>
                <div class="col-md-6">
                    <div class="input-group date" id="time_2_2">
                        <input id="stop_saturday_date" type="text" title="Окончание работы объекта инкассации в субботу" class="form-control" name="stop_saturday_date" value="{{ old('stop_saturday_date') }}" required autofocus>
                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                    @if ($errors->has('stop_saturday_date'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('stop_saturday_date') }}</strong>
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
            <div class="form-group{{ $errors->has('start_sunday_date') ? ' has-error' : '' }}">
                <label for="start_sunday_date" class="col-md-6 control-label">
                    с
                </label>
                <div class="col-md-6">
                    <div class="input-group date" id="time_3_1">
                        <input id="start_sunday_date" type="text" title="Начало работы объекта инкассации в воскресенье" class="form-control" name="start_sunday_date" value="{{ old('start_sunday_date') }}" required autofocus>
                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                    @if ($errors->has('start_sunday_date'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('start_sunday_date') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('stop_sunday_date') ? ' has-error' : '' }}">
                <label for="stop_sunday_date" class="col-md-6 control-label">
                    по
                </label>
                <div class="col-md-6">
                    <div class="input-group date" id="time_3_2">
                        <input id="stop_sunday_date" type="text" title="Окончание работы объекта инкассации в воскресенье" class="form-control" name="stop_sunday_date" value="{{ old('stop_sunday_date') }}" required autofocus>
                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                    @if ($errors->has('stop_sunday_date'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('stop_sunday_date') }}</strong>
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
                    <select id="address_type" title="Тип адреса объекта инкассации" class="form-control" name="address_type" value="{{ old('address_type') }}" required autofocus>
                        <option value="01">01 – юридический адрес</option>
                        <option value="02">02 – международный адрес</option>
                        <option value="03">03 – фактический адрес</option>
                        <option value="04">04  – почтовый адрес</option>
                        <option value="05">05 – юридический адрес (ЕГРЮЛ/ЕГРИП)</option>
                        <option value="06">06 – Адрес регистрации физлица</option>
                        <option value="07">07 – Адрес фактического проживания физлица</option>
                        <option value="08">08 – Адрес рождения физлица</option>
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
                    <select id="type_settlement" title="Тип населенного пункта, в котором находится объект инкассации" class="form-control" name="type_settlement" value="{{ old('type_settlement') }}" required autofocus>
                        <option value="01"> 01 – город</option>
                        <option value="02"> 02 – поселок</option>
                        <option value="03"> 03 – село</option>
                        <option value="04"> 04 – поселок городского типа</option>
                        <option value="05"> 05 – станица</option>
                        <option value="06"> 06 – аул</option>
                        <option value="07"> 07 – рабочий поселок</option>
                        <option value="08"> 09 – кордон</option>
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
    <div class="col-md-10">
        <div class="form-group{{ $errors->has('name_settlement') ? ' has-error' : '' }}">
            <label for="name_settlement" class="col-md-6 control-label">
                Наименование населенного пункта
            </label>
            <div class="col-md-6">
                <input id="name_settlement" type="text" title="Наименование населенного пункта, в котором находится объект инкассации" class="form-control" name="name_settlement" value="{{ old('name_settlement') }}" required autofocus>
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
            <label for="name_street" class="col-md-6 control-label">
                Улица
            </label>
            <div class="col-md-6">
                <input id="name_street" type="text" title="Улица, по которой находится объект инкассации" class="form-control" name="name_street" value="{{ old('name_street') }}" required autofocus>
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
                <input id="house_no" type="text" title="Номер дома (владение), в котором находится объект инкассации" class="form-control" name="house_no" value="{{ old('house_no') }}" required autofocus>
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
                <input id="housing_no" type="text" title="Корпус (строение), в котором находится объект инкассации" class="form-control" name="housing_no" value="{{ old('housing_no') }}" required autofocus>
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
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
            <label for="service" class="col-md-4 control-label">
                Инкассаторская услуга
            </label>
            <div class="col-md-8">
                <select id="service" title="Инкассаторская услуга для оказания юридическому лицу" class="form-control" name="service" value="{{ old('service') }}" required autofocus>
                    <option value="01">01 – город</option>
                    <option value="02">02 – поселок</option>
                    <option value="03">03 – село</option>
                    <option value="04">04 – поселок городского типа</option>
                    <option value="05">05 – станица</option>
                    <option value="06">06 – аул</option>
                    <option value="07">07 – рабочий поселок</option>
                    <option value="08">08 – кордон</option>
                </select>
                @if ($errors->has('service'))
                    <span class="help-block">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Button -->
<div class="row">
    <div class="col-md-offset-10 col-md-2">
        <fieldset>
            <legend></legend>
            <div class="form-group">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
            </div>
        </fieldset>
    </div>
</div>