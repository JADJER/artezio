@extends('layouts/app')

@section('style')
@endsection

@section('script')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Регистрация новой заявки</div>
    <div class="panel-body">
        <form id="form_order" class="form-horizontal" role="form" method="POST" action="{{ url('/order/save') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('order_type') ? ' has-error' : '' }}">
                        <label for="order_type" class="col-md-6 control-label">
                            Тип заявки
                        </label>
                        <div class="col-md-6">
                            <select id="order_type" title="Тип заявки, выбираемый при формировании ЭД" class="form-control" name="order_type" autofocus>
                                <option disabled selected value> -- Выберите значение -- </option>
                                @foreach($order_type as $ot)
                                    <option value="{{ $ot->id }}">{{ $ot->order_type }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('order_type'))
                                <span class="help-block">
                                <strong>{{ $errors->first('order_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('order_no') ? ' has-error' : '' }}">
                        <label for="order_no" class="col-md-6 control-label">
                            Номер заявки
                        </label>
                        <div class="col-md-6">
                            <input id="order_no" type="text" class="form-control" name="order_no" value="{{ $order_no }}" disabled>
                            @if ($errors->has('order_no'))
                                <span class="help-block">
                                <strong>{{ $errors->first('order_no') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('order_date') ? ' has-error' : '' }}">
                        <label for="order_date" class="col-md-6 control-label">
                            Дата заявки
                        </label>
                        <div class="col-md-6">
                            <div class="input-group date" id="date_1">
                                <input id="order_date" type="test" class="form-control" name="order_date" value="{{ $date }}" disabled>
                            </div>
                            @if ($errors->has('order_date'))
                                <span class="help-block">
                                <strong>{{ $errors->first('order_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('order_status') ? ' has-error' : '' }}">
                        <label for="order_status" class="col-md-6 control-label">
                            Статус ЭД
                        </label>
                        <div class="col-md-6">
                            <input id="order_status" type="text" class="form-control" name="order_status" value="{{ old('order_status') }}" disabled>
                            @if ($errors->has('order_status'))
                                <span class="help-block">
                                <strong>{{ $errors->first('order_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit" class="col-md-6 control-label">
                            Подразделение банка
                        </label>
                        <div class="col-md-6">
                            <select id="unit" title="Подразделения банка, где обслуживается клиент" class="form-control" name="unit" autofocus>
                                <option disabled selected value> -- Выберите значение -- </option>
                            @foreach($bank_units as $bu)
                                <option value="{{ $bu->id }}">{{ $bu->unit }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('unit'))
                                <span class="help-block">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('unn') ? ' has-error' : '' }}">
                        <label for="unn" class="col-md-6 control-label">
                            ИНН/КИО
                        </label>
                        <div class="col-md-6">
                            <input id="unn" type="text" class="form-control" name="unn" value="{{ old('unn') }}" autofocus>
                            @if ($errors->has('unn'))
                                <span class="help-block">
                                <strong>{{ $errors->first('unn') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('kpp') ? ' has-error' : '' }}">
                        <label for="kpp" class="col-md-6 control-label">
                            КПП
                        </label>
                        <div class="col-md-6">
                            <input id="kpp" type="text" class="form-control" name="kpp" value="{{ old('kpp') }}" autofocus>
                            @if ($errors->has('kpp'))
                                <span class="help-block">
                                <strong>{{ $errors->first('kpp') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('org_name') ? ' has-error' : '' }}">
                        <label for="org_name" class="col-md-6 control-label">
                            Полное наименование организации
                        </label>
                        <div class="col-md-6">
                            <input id="org_name" type="text" class="form-control" name="org_name" value="{{ old('org_name') }}" autofocus>
                            @if ($errors->has('org_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('org_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('ogrn') ? ' has-error' : '' }}">
                        <label for="ogrn" class="col-md-6 control-label">
                            ОГРН
                        </label>
                        <div class="col-md-6">
                            <input id="ogrn" type="text" class="form-control" name="ogrn" value="{{ old('ogrn') }}" autofocus>
                            @if ($errors->has('ogrn'))
                                <span class="help-block">
                                <strong>{{ $errors->first('ogrn') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                        <label for="contact_name" class="col-md-6 control-label">
                            Имя уполномоченного сотрудника организации клиента для решения вопросов организации инкассации
                        </label>
                        <div class="col-md-6">
                            <input id="contact_name" type="text" title="ФИО, Должность" class="form-control" name="contact_name" value="{{ old('contact_name') }}" autofocus>
                            @if ($errors->has('contact_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('contact_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
                        <label for="contact_phone" class="col-md-6 control-label">
                            Номер телефона, факса уполномоченного сотрудника организации клиента для решения вопросов организации инкассации
                        </label>
                        <div class="col-md-6">
                            <input id="contact_phone" type="text" title="Номер телефона для связи" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}" autofocus>
                            @if ($errors->has('contact_phone'))
                                <span class="help-block">
                            <strong>{{ $errors->first('contact_phone') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }}">
                        <label for="account_no" class="col-md-6 control-label">
                            Номер счёта зачисления
                        </label>
                        <div class="col-md-6">
                            <input id="account_no" type="text" title="Номер счета клиента в банке, на который требуется зачислить инкассированные денежные средства" class="form-control" name="account_no" value="{{ old('account_no') }}" autofocus>
                            @if ($errors->has('account_no'))
                                <span class="help-block">
                            <strong>{{ $errors->first('account_no') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('bik') ? ' has-error' : '' }}">
                        <label for="bik" class="col-md-6 control-label">
                            БИК
                        </label>
                        <div class="col-md-6">
                            <input id="bik" type="text" title="БИК банка, в который требуется инкассировать денежные средства" class="form-control" name="bik" value="{{ old('bik') }}" autofocus>
                            @if ($errors->has('bik'))
                                <span class="help-block">
                            <strong>{{ $errors->first('bik') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('bank_account_no') ? ' has-error' : '' }}">
                        <label for="bank_account_no" class="col-md-6 control-label">
                            Номер корр. счета банка
                        </label>
                        <div class="col-md-6">
                            <input id="bank_account_no" type="text" title="Счет и реквизиты банка, на который производится перечисление проинкассированных средств" class="form-control" name="bank_account_no" value="{{ old('bank_account_no') }}" autofocus>
                            @if ($errors->has('bank_account_no'))
                                <span class="help-block">
                            <strong>{{ $errors->first('bank_account_no') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                        <label for="bank_name" class="col-md-6 control-label">
                            Наименование банка
                        </label>
                        <div class="col-md-6">
                            <input id="bank_name" type="text" title="Наименование банка, в который требуется инкассировать денежные средства" class="form-control" name="bank_name" value="{{ old('bank_name') }}" autofocus>
                            @if ($errors->has('bank_name'))
                                <span class="help-block">
                            <strong>{{ $errors->first('bank_name') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('swift') ? ' has-error' : '' }}">
                        <label for="swift" class="col-md-6 control-label">
                            SWIFT
                        </label>
                        <div class="col-md-6">
                            <input id="swift" type="text" title="SWIFT банка, в который требуется инкассировать денежные средства" class="form-control" name="swift" value="{{ old('swift') }}" autofocus>
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
                    <div class="form-group{{ $errors->has('bank_add_detail') ? ' has-error' : '' }}">
                        <label for="bank_add_detail" class="col-md-6 control-label">
                            Иные реквизиты банка зачисления валюты
                        </label>
                        <div class="col-md-6">
                            <input id="bank_add_detail" type="text" title="Указывается дополнительная информация" class="form-control" name="bank_add_detail" value="{{ old('bank_add_detail') }}" autofocus>
                            @if ($errors->has('bank_add_detail'))
                                <span class="help-block">
                            <strong>{{ $errors->first('bank_add_detail') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group">
                        <a href="{{ url('/object/create') }}" class="list-group-item active"><span class="badge">0/50</span>Добавить обьект собственности</a>
                        <div class="list-group-item">
                            <p class="list-group-item-text">
                                Нет обьектов собственности
                            </p>
                        </div>
                        <a href="{{ url('/object/create') }}" class="list-group-item active"><span class="badge">0/50</span>Добавить обьект собственности</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-offset-10 col-md-2">
                <div class="form-group">
                    <button id="singlebutton" form="form_order" name="singlebutton" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection