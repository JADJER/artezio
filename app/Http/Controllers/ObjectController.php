<?php

namespace App\Http\Controllers;

use App\FrequencyCollector;
use App\Http\Requests\ObjectFormRequest;
use App\MethodDelivery;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function create()
    {
        $method_delivery = MethodDelivery::all();
        $frequency_collector = FrequencyCollector::all();
        return view('layouts.orders.objects.edit', compact('method_delivery', 'frequency_collector'));
    }

    /**
     * @param OrderFormRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(ObjectFormRequest $request)
    {
        return redirect('/');
    }

    public function sign()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
