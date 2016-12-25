<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'account_no' => 'required|digits:20|regex:/([0-9]{5})([0-9АВСЕНКМРТХABCEHKMPTX]{1})([0-9]{14})/',
            'bank_account_no' => 'required|regex:/([0-9]{5})([0-9АВСЕНКМРТХABCEHKMPTX]{1})([0-9]{14})/',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'time_job_start' => '',
            'time_job_stop' => '',
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
            'account_no.required' => 'Не указан счет для перечисления инкассированных средств',
            'account_no.digits' => 'Количество символов в поле Счет не соответствует норме (20)',
            'account_no.regex' => 'Номер расчетного счета содержит недопустимые символы',
           // 'account_no.required' => 'Ключ счета %n% не верен. Должен быть %s%.',
            'bank_account_no.required' => 'Не указан счет для перечисления инкассированных средств',
            //'bank_account_no.digits' => 'Количество символов в поле Счет не соответствует норме (20)',
            'bank_account_no.regex' => 'Номер расчетного счета содержит недопустимые символы',
           // 'bank_account_no.required' => 'Ключ счета %n% не верен. Должен быть %s%.',
            'contact_name.required' => 'Не указано имя уполномоченного сотрудника организации клиента для решения вопросов организации инкассации',
            'contact_phone.required' => 'Не указан номер телефона уполномоченного сотрудника организации клиента для решения вопросов организации инкассации',
        ];
    }
}
