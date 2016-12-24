<?php

namespace App\Http\Controllers;

use App\BankUnit;
use App\Http\Requests\OrderFormRequest;
use App\OrderType;
use App\Order;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $order_type = OrderType::all();
        $bank_units = BankUnit::all();
        $order_no = "2-" . str_pad(Order::all()->count() + 1, 7, '0', STR_PAD_LEFT);

        $date = date('d-m-Y');

        return view('layouts.orders.create', compact('order_type', 'bank_units', 'order_no', 'date'));
    }

    /**
     * @param OrderFormRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(OrderFormRequest $request)
    {
        $order = new Order;
        $utils = new \App\Utils;

        $order_no = Order::all()->count() + 1;

        $order->user_id = Auth::id();
        $order->order_type = $utils->getOrderType($request->input('order_type'));
        $order->order_no = $order_no;
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
        return redirect('/object/create/' . $order_no);
    }

    public function sign($id)
    {
        $order = Order::find($id);
        $utils = new \App\Utils;

        $order->order_type = $utils->getOrderType(3);
        $order->isSigned = 1;

        $order->save();
    }

    public function edit($id)
    {

    }

    public function delete($id)
    {
        $order = Order::find($id);
        $utils = new \App\Utils;

        $order->order_type = $utils->getOrderType(4);
        $order->isDeleted = 1;

        $order->save();
    }

    public function view()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('layouts.orders.view', compact('orders'));
    }
}
