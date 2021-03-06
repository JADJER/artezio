<?php

namespace App\Http\Controllers;

use App\CashCode;
use App\ColectorService;
use App\FrequencyCollector;
use App\Http\Requests\ObjectFormRequest;
use App\MethodDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Object;
use App\Order;
use Carbon\Carbon;

class ObjectController extends Controller {
    public function create($id) {
        $method_delivery = MethodDelivery::all();
        $frequency_collector = FrequencyCollector::all();
        $collector_service = ColectorService::all();
        $cash_code = CashCode::All();
        return view('layouts.orders.objects.create', compact('method_delivery', 'frequency_collector', 'id', 'collector_service', 'cash_code'));
    }

    public function save(ObjectFormRequest $request, $id) {

        $object = new Object;

        $order_no = $request->input('order_id');

        if ($order_no == $id) {
            $object->order_id = $order_no;
            $object->time_up = $request->input('time_up');
            $object->method_delivery = $request->input('method_delivery');
            $object->frequency_collectors = $request->input('frequency_collectors');
            $object->date_collectors = $request->input('date_collectors');
            $object->count_cash = $request->input('count_cash');
            $object->cash_code = $request->input('cash_code');
            $object->head_object = $request->input('head_object');
            $object->start_date = Carbon::createFromFormat('d.m.Y', $request->input('start_date'));

            if ($request->input('time_job_start') != null) {
                $object->start_job_date = $request->input('time_job_start');
            }

            if ($request->input('time_job_stop') != null) {
                $object->stop_job_date = $request->input('time_job_stop');
            }

            if ($request->input('time_saturday_start') != null) {
                $object->start_saturday_date = $request->input('time_saturday_start');
            }

            if ($request->input('time_saturday_stop') != null) {
                $object->stop_saturday_date = $request->input('time_saturday_stop');
            }

            if ($request->input('time_sunday_start') != null) {
                $object->start_sunday_date = $request->input('time_sunday_start');
            }

            if ($request->input('time_sunday_stop') != null) {
                $object->stop_sunday_date = $request->input('time_sunday_stop');
            }

            $object->address_type = $request->input('address_type');
            $object->type_settlement = $request->input('type_settlement');
            $object->name_settlement = $request->input('name_settlement');
            $object->name_street = $request->input('name_street');
            $object->house_no = $request->input('house_no');
            $object->housing_no = $request->input('housing_no');

            $service_arr = array();

            $i = 1;

            while(null !== $request->input('service_' . $i)) {
                $service_arr[] = $request->input('service_' . $i++);
            }

            $object->services = json_encode($service_arr);

            $object->save();

            return redirect('/order/edit/' . $order_no);
        } else {
            return redirect('/');
        }
    }

    public function update(ObjectFormRequest $request, $or, $ob) {
        $object = Object::find($ob);

        $object->time_up = $request->input('time_up');
        $object->method_delivery = $request->input('method_delivery');
        $object->frequency_collectors = $request->input('frequency_collectors');
        $object->date_collectors = $request->input('date_collectors');
        $object->count_cash = $request->input('count_cash');
        $object->cash_code = $request->input('cash_code');
        $object->head_object = $request->input('head_object');
        $object->start_date = Carbon::createFromFormat('d.m.Y', $request->input('start_date'));

        if ($request->input('time_job_start') != null) {
            $object->start_job_date = $request->input('time_job_start');
        }

        if ($request->input('time_job_stop') != null) {
            $object->stop_job_date = $request->input('time_job_stop');
        }

        if ($request->input('time_saturday_start') != null) {
            $object->start_saturday_date = $request->input('time_saturday_start');
        }

        if ($request->input('time_saturday_stop') != null) {
            $object->stop_saturday_date = $request->input('time_saturday_stop');
        }

        if ($request->input('time_sunday_start') != null) {
            $object->start_sunday_date = $request->input('time_sunday_start');
        }

        if ($request->input('time_sunday_stop') != null) {
            $object->stop_sunday_date = $request->input('time_sunday_stop');
        }

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

        while(null !== $request->input('service_' . $i)) {
            $service_arr[] = $request->input('service_' . $i++);
        }

        $object->services = json_encode($service_arr);

        $object->save();


        return redirect('/order/edit/' . $or);
    }

    public function edit($or, $ob) {
        try {

            if (!Auth::guest() && Auth::user()->isAdmin) {

                $order = Order::findOrFail($or);

                if ($order->isDeleted || $order->isSigned) {
                    return redirect('/');
                } else {
                    $object = Object::findOrFail($ob);
               }

            } else if (Auth::check()) {

                $order = Order::where('id', $or)->where('user_id', Auth::id())->firstOrFail();

                if ($order->isDeleted || $order->isSigned) {
                    return redirect('/');
                } else {
                    $object = Object::where('id', $ob)->where('order_id', $or)->firstOrFail();
                }

            } else {
                return redirect('/');
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return abort(404);
        }

        $method_delivery = MethodDelivery::all();
        $frequency_collector = FrequencyCollector::all();
        $collector_service = ColectorService::all();
        $cash_code = CashCode::All();

        return view('layouts.orders.objects.edit', compact('method_delivery', 'frequency_collector', 'or', 'ob', 'collector_service', 'cash_code', 'object'));
    }

    public function delete($or, $ob) {

        try {

            $order = Order::where('id', $or)->where('user_id', Auth::id())->firstOrFail();

            if ($order->isDeleted || $order->isSigned) {
                return redirect('/');
            } else {
                Object::findOrFail($ob)->delete();;
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return abort(404);
        }

        return redirect('/order/edit/' . $or);
    }

}
