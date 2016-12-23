@extends('layouts/app')

@section('style')
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

    </script>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Регистрация новой заявки</div>
        <div class="panel-body">
            <form id="form_order" class="form-horizontal" role="form" method="POST" action="{{ url('/orders/create') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('order_type') ? ' has-error' : '' }}">
                            <label for="order_type" class="col-md-6 control-label">
                                Тип заявки
                            </label>
                            <div class="col-md-6">
                                <select id="order_type" title="Тип заявки, выбираемый при формировании ЭД" list="order_type_list" class="form-control" name="order_type" value="{{ old('order_type') }}" required autofocus>
                                    <option disabled selected value> -- Выберите значение -- </option>
                                    @foreach($order_type as $ot)
                                        <option value="{{ $ot->id }}">{{ $ot->order_t }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_order'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('type_order') }}</strong>
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
                                <input id="order_no" type="text" class="form-control" name="order_no" value="{{ old('order_no') }}" required disabled>
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
                                    <input id="order_date" type="test" class="form-control" name="order_date" value="{{ old('order_date') }}" required disabled>
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
                                <input id="order_status" type="text" class="form-control" name="order_status" value="{{ old('order_status') }}" required autofocus>
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
                                <input id="unit" type="text" title="Подразделения банка, где обслуживается клиент" list="unit_list" class="form-control" name="unit" value="{{ old('unit') }}" required autofocus>
                                <datalist id="unit_list" >
                                    <option> Google
                                    <option> IE9
                                </datalist>
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
                                <input id="unn" type="text" class="form-control" name="unn" value="{{ old('unn') }}" required autofocus>
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
                                <input id="kpp" type="text" class="form-control" name="kpp" value="{{ old('kpp') }}" required autofocus>
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
                                <input id="org_name" type="text" class="form-control" name="org_name" value="{{ old('org_name') }}" required autofocus>
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
                                <input id="ogrn" type="text" class="form-control" name="ogrn" value="{{ old('ogrn') }}" required autofocus>
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
                                <input id="contact_name" type="text" title="ФИО, Должность" class="form-control" name="contact_name" value="{{ old('contact_name') }}" required autofocus>
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
                                <input id="contact_phone" type="text" title="Номер телефона для связи" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}" required autofocus>
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
                                <input id="account_no" type="text" title="Номер счета клиента в банке, на который требуется зачислить инкассированные денежные средства" class="form-control" name="account_no" value="{{ old('account_no') }}" required autofocus>
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
                                <input id="bik" type="text" title="БИК банка, в который требуется инкассировать денежные средства" class="form-control" name="bik" value="{{ old('bik') }}" required autofocus>
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
                                <input id="bank_account_no" type="text" title="Счет и реквизиты банка, на который производится перечисление проинкассированных средств" class="form-control" name="bank_account_no" value="{{ old('bank_account_no') }}" required autofocus>
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
                                <input id="bank_name" type="text" title="Наименование банка, в который требуется инкассировать денежные средства" class="form-control" name="bank_name" value="{{ old('bank_name') }}" required autofocus>
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
                                <input id="swift" type="text" title="SWIFT банка, в который требуется инкассировать денежные средства" class="form-control" name="swift" value="{{ old('swift') }}" required autofocus>
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
                        <div class="form-group{{ $errors->has('babk_add_detail') ? ' has-error' : '' }}">
                            <label for="babk_add_detail" class="col-md-6 control-label">
                                Иные реквизиты банка зачисления валюты
                            </label>
                            <div class="col-md-6">
                                <input id="babk_add_detail" type="text" title="Указывается дополнительная информация" class="form-control" name="babk_add_detail" value="{{ old('babk_add_detail') }}" required autofocus>
                                @if ($errors->has('babk_add_detail'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('babk_add_detail') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-10 col-md-2">
                    <div class="form-group">
                        <button id="singlebutton" form="form_order" name="singlebutton" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection