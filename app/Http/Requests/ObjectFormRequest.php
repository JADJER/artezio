<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjectFormRequest extends FormRequest
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
            'time_up' => 'required',
            'method_delivery' => 'required',
            'frequency_collectors' => 'required',
            'date_collectors' => 'required_if:frequency_collectors,4',
            'count_cash' => 'required',
            'cash_code' => 'required',
            'head_object' => 'required',
            'start_date' => 'required|date|after:yesterday',
           // 'time_saturday_start' => '',
            //'time_saturday_stop' => '',
            //'time_sunday_start' => '',
            //s'time_sunday_stop' => '',
        ];
    }

    public function messages()
    {
        return [
            'time_up.required' => 'Не указано желательное время сдачи наличных (самостоятельно)/ время прибытия инкассаторов в организацию',
            'method_delivery.required' => 'Не указан предпочитаемый способ сдачи денежной наличности для инкассации',
            'frequency_collectors.required' => 'Не указана Периодичность оказания инкассаторских услуг по объекту',
            'date_collectors.required_if' => 'Не указан день недели для оказания инкассаторских услуг по объекту',
            'count_cash.required' => 'Не указана сумма, предназначенная к инкассации',
            'cash_code.required' => 'Не указан код валюты',
            //'cash_code.regex' => 'Код валюты должен состоять из 3 букв латинского алфавита',
            //'cash_code.alpha' => 'Введены недопустимые значения кода валюты',
            'head_object.required' => 'Не указана контактная информация руководителя объекта',
            'start_date.required' => 'Не указана желательная дата начала обслуживания/дата открытия торговой точки',
            'start_date.after' => 'Дата начала обслуживания не может быть меньше текущей даты',
        ];
    }
}
