<?php

namespace App\Http\Controllers;

use App\CashCode;
use App\ColectorService;
use App\FrequencyCollector;
use App\Http\Requests\ObjectFormRequest;
use App\MethodDelivery;
use Illuminate\Http\Request;
use App\Object;

class ObjectController extends Controller
{
    public function create($id)
    {
        $method_delivery = MethodDelivery::all();
        $frequency_collector = FrequencyCollector::all();
        $collector_service = ColectorService::all();
        $cash_code = CashCode::All();
        return view('layouts.orders.objects.create', compact('method_delivery', 'frequency_collector', 'id', 'collector_service', 'cash_code'));
    }

    public function save(ObjectFormRequest $request, $id)
    {

        $object = new Object;

        $order_no =  $request->input('order_id');

        if ($order_no == $id)
        {
            $object->id = $order_no;
            $object->time_up = $request->input('time_up');
            $object->method_delivery = $request->input('method_delivery');
            $object->frequency_collectors = $request->input('frequency_collectors');
            $object->date_collectors = $request->input('date_collectors');
            $object->count_cash = $request->input('count_cash');
            $object->cash_code = $request->input('cash_code');
            $object->head_object = $request->input('head_object');
            $object->start_date = $request->input('start_date');
            $object->start_job_date = $request->input('time_job_start');
            $object->stop_job_date = $request->input('time_job_stop');
            $object->start_saturday_date = $request->input('time_saturday_start');
            $object->stop_saturday_date = $request->input('time_saturday_stop');
            $object->start_sunday_date = $request->input('time_sunday_start');
            $object->stop_sunday_date = $request->input('time_sunday_stop');
            $object->address_type = $request->input('address_type');
            $object->type_settlement = $request->input('type_settlement');
            $object->name_settlement = $request->input('name_settlement');
            $object->name_street = $request->input('name_street');
            $object->house_no = $request->input('house_no');
            $object->housing_no = $request->input('housing_no');

            $service_arr = array();

            $i = 1;

            while(null !== $request->input('service_' . $i))
            {
                $service_arr[] = $request->input('service_' . $i++);
            }

            $object->services = json_encode($service_arr);

            $object->save();

            return redirect('/order/edit/' . $order_no);
        } else
            return redirect('/');
    }

    public function update(ObjectFormRequest $request, $or, $ob)
    {
        $utils = new \App\Utils;
        $object = Object::find($ob);

        $object->time_up = $request->input('time_up');
        $object->method_delivery = $request->input('method_delivery');
        $object->frequency_collectors = $request->input('frequency_collectors');
        $object->date_collectors = $request->input('date_collectors');
        $object->count_cash = $request->input('count_cash');
        $object->cash_code = $request->input('cash_code');
        $object->head_object = $request->input('head_object');
        $object->start_date = $request->input('start_date');
        $object->start_job_date = $request->input('time_job_start');
        $object->stop_job_date = $request->input('time_job_stop');
        $object->start_saturday_date = $request->input('time_saturday_start');
        $object->stop_saturday_date = $request->input('time_saturday_stop');
        $object->start_sunday_date = $request->input('time_sunday_start');
        $object->stop_sunday_date = $request->input('time_sunday_stop');
        $object->address_type = $request->input('address_type');
        $object->type_settlement = $request->input('type_settlement');
        $object->name_settlement = $request->input('name_settlement');
        $object->name_street = $request->input('name_street');
        $object->house_no = $request->input('house_no');
        $object->housing_no = $request->input('housing_no');
        $object->services = $request->input('services');
        $object->type_settlement = $request->input('type_settlement');

        $service_arr = array();

        $i = 1;

        while(null !== $request->input('service_' . $i))
        {
            $service_arr[] = $request->input('service_' . $i++);
        }

        $object->services = json_encode($service_arr);

        $object->save();


        return redirect('/order/edit/' . $or);
    }

    public function edit($or, $ob)
    {
        $object = Object::find($ob);

        $method_delivery = MethodDelivery::all();
        $frequency_collector = FrequencyCollector::all();
        $collector_service = ColectorService::all();
        $cash_code = CashCode::All();

        return view('layouts.orders.objects.edit', compact('method_delivery', 'frequency_collector', 'or', 'ob', 'collector_service', 'cash_code', 'object'));
    }

    public function delete($or, $ob)
    {
        Object::find($ob)->delete();

        return redirect('/order/edit/' . $or);
    }
}
