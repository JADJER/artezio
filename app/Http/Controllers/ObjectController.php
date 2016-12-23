<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function create()
    {
        $order_type = OrderType::all();
        $bank_units = BankUnit::all();
        $order_no = "2-" . str_pad(Order::all()->count() + 1, 7, '0', STR_PAD_LEFT);

        $date = date('d-m-Y');

        return view('layouts.orders.edit', compact('order_type', 'bank_units', 'order_no', 'date'));
    }

    /**
     * @param OrderFormRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(OrderFormRequest $request)
    {
        $order = new Order;
        $utils = new \App\Utils;

        $order->user_id = Auth::id();
        $order->order_type = $utils->getOrderType($request->input('order_type'));
        $order->order_no = Order::all()->count() + 1;
        $order->order_date = date('d-m-Y');
        $order->order_status = $utils->getOrderStatus($request->input('order_type'));
        $order->unit = $request->input('unit');
        $order->unn = $request->input('unn');
        $order->kpp = $request->input('kpp');
        $order->org_name = $request->input('org_name');
        $order->ogrn = $request->input('ogrn');
        $order->contact_name = $request->input('contact_name');
        $order->contact_phone = $request->input('contact_phone');
        $order->account_no = $request->input('account_no');
        $order->bik = $request->input('bik');
        $order->bank_account_no = $request->input('bank_account_no');
        $order->bank_name = $request->input('bank_name');
        $order->swift = $request->input('swift');
        $order->bank_add_detail = $request->input('bank_add_detail');
        $order->save();
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
