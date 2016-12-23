<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderObjectFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_type' => 'required',
            'unit' => 'required',
            'bank_name' => 'required',
            'bik' => 'required|numeric|regex:/([0-9]{9})/',
            'account_no' => 'required|',
            'bank_account_no' => 'required|',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'method_delivery' => 'required',
            'service' => 'required',
            'time_up' => 'required',
            'frequency_collectors' => 'required',
            'date_collectors' => 'required',
            'count_cash' => 'required',
            'cash_code' => 'required|digits:3|alpha',
            'head_object' => 'required',
            'start_date' => 'required|date|after:now',
            '' => 'different',
            '' => '',
            '' => '',
            '' => '',
        ];
    }

    public function messages()
    {
        return [
            'order_type.required' => 'Не указан тип заявки',
            'unit.required' => 'Не указано подразделение банка',
            'bank_name.required' => 'Не указано наименование банка',
            'bik.required' => 'Не указан БИК',
            'bik.regex' => 'Количество символов в поле БИК не соответствует норме (9)',
            'bik.numeric' => 'Введены недопустимые символы в поле БИК',
            'bik.numeric' => 'Не указан счет для перечисления инкассированных средств',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            'contact_name.required' => 'Не указано имя уполномоченного сотрудника организации клиента для решения вопросов организации инкассации',
            'contact_phone.required' => 'Не указан номер телефона уполномоченного сотрудника организации клиента для решения вопросов организации инкассации ',
            'method_delivery.required' => 'Не указан предпочитаемый способ сдачи денежной наличности для инкассации',
            'service' => 'Не указана желаемая инкассаторская услуга',
            'time_up' => 'Не указано желательное время сдачи наличных (самостоятельно)/ время прибытия инкассаторов в организацию',
            'frequency_collectors.required' => 'Не указана Периодичность оказания инкассаторских услуг по объекту',
            'date_collectors.required' => 'Не указан день недели для оказания инкассаторских услуг по объекту',
            'count_cash.required' => 'Не указана сумма, предназначенная к инкассации',
            'cash_code.required' => 'Не указан код валюты',
            'cash_code.digits' => 'Код валюты должен состоять из 3 букв латинского алфавита',
            'cash_code.alpha' => 'Введены недопустимые значения кода валюты',
            'head_object.required' => 'Не указана контактная информация руководителя объекта',
            'start_date.required' => 'Не указана желательная дата начала обслуживания/дата открытия торговой точки',
            'start_date.after' => 'Дата начала обслуживания не может быть меньше текущей даты',
            '' => 'Не указан режим работы объекта инкассации',
            '' => 'Режим работы объекта инкассации заполнен некорректно',
        ];
    }
}
