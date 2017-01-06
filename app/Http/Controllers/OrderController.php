<?php

namespace App\Http\Controllers;

use App\BankUnit;
use App\Http\Requests\OrderFormRequest;
use App\Http\Requests\SearchRequest;
use App\Object;
use App\OrderStatus;
use App\OrderType;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        $order_type = OrderType::all();
        $bank_units = BankUnit::all();
        $order_count = Order::with('id')->max('id');
        $order_no = "2-" . str_pad($order_count + 1, 7, '0', STR_PAD_LEFT);

        $date = date('d.m.Y');

        return view('layouts.orders.create', compact('order_type', 'bank_units', 'order_no', 'date'));
    }

    public function save(OrderFormRequest $request) {
        $order = new Order;
        $utils = new \App\Utils;

        $order_count = Order::with('id')->max('id');

        $order->user_id = Auth::id();
        $order->order_status = $request->input('order_status');
        $order->order_type = $request->input('order_type');

        $order->unit = $request->input('unit');

        $unn = $request->input('unn');
        $order->unn = $unn;

        $kpp = $request->input('kpp');
        $order->kpp = $request->input('kpp');

        $org_name = $request->input('org_name');
        $order->org_name = $org_name;

        $ogrn = $request->input('ogrn');
        $order->ogrn = $ogrn;

        $order->contact_name = $request->input('contact_name');
        $order->contact_phone = $request->input('contact_phone');

        $account_no = $request->input('account_no');
        $order->account_no = $account_no;

        $bik = $request->input('bik');
        $order->bik = $bik;

        $bank_account_no = $request->input('bank_account_no');
        $order->bank_account_no = $bank_account_no;

        $order->bank_name = $request->input('bank_name');

        $swift = $request->input('swift');
        $order->swift = $swift;

        $bank_add_detail = $request->input('bank_add_detail');
        $order->bank_add_detail = $bank_add_detail;

        $check_arr = [$account_no, $bik, $bank_account_no, $unn, $kpp, $org_name, $ogrn, $swift, $bank_add_detail];

        $order->order_status = $utils->setSign($check_arr);

        $order->save();

        return redirect('/object/create/' . $order_count);
    }

    public function update(OrderFormRequest $request, $id) {
        $utils = new \App\Utils;
        $order = Order::find($id);
        if ($order->isSigned)
            return redirect('/');
        $order->user_id = Auth::id();
        $order->order_status = $request->input('order_status');
        $order->order_type = $request->input('order_type');

        $order->unit = $request->input('unit');

        $unn = $request->input('unn');
        $order->unn = $unn;

        $kpp = $request->input('kpp');
        $order->kpp = $request->input('kpp');

        $org_name = $request->input('org_name');
        $order->org_name = $org_name;

        $ogrn = $request->input('ogrn');
        $order->ogrn = $ogrn;

        $order->contact_name = $request->input('contact_name');
        $order->contact_phone = $request->input('contact_phone');

        $account_no = $request->input('account_no');
        $order->account_no = $account_no;

        $bik = $request->input('bik');
        $order->bik = $bik;

        $bank_account_no = $request->input('bank_account_no');
        $order->bank_account_no = $bank_account_no;

        $order->bank_name = $request->input('bank_name');

        $swift = $request->input('swift');
        $order->swift = $swift;

        $bank_add_detail = $request->input('bank_add_detail');
        $order->bank_add_detail = $bank_add_detail;

        $check_arr = [$account_no, $bik, $bank_account_no, $unn, $kpp, $org_name, $ogrn, $swift, $bank_add_detail];

        $order->order_status = $utils->setSign($check_arr);

        $order->save();

        return redirect('/orders');
    }

    public function sign($id) {

        try {
            $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        }  catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return abort(404);
        }

        if ($order->isDeleted || $order->isSigned) {
            return redirect('/');
        } else {
            $order = Order::find($id);

            $order->order_status = 3;
            $order->isSigned = 1;

            $order->save();

            return redirect('/');
        }
    }

    public function edit($id) {
        try {

            if (!Auth::guest() && Auth::user()->isAdmin) {
                $order = Order::findOrFail($id);
            } else if (Auth::check()) {
                $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
            } else {
                return redirect('/');
            }

        }  catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return abort(404);
        }

        if ($order->isDeleted) {
            return redirect('/');
        } else {
            $objects = Object::where('order_id', $id)->get();
            $order_type = OrderType::all();
            $bank_units = BankUnit::all();
            $order_status = OrderStatus::all();

            return view('layouts.orders.edit', compact('order', 'objects', 'order_type', 'order_status', 'bank_units'));
        }
    }

    public function delete($id) {
        try {
            $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        }  catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return abort(404);
        }

        if ($order->isDeleted || $order->isSigned)
            return redirect('/');
        else {
            $order->order_status = 4;
            $order->isDeleted = 1;

            $order->save();

            return redirect('/');
        }
    }

    public function view() {
        $order_status = OrderStatus::All();
        $order_type = OrderType::All();

        if (!Auth::guest() && Auth::user()->isAdmin) {
            $orders = Order::All();
        } else {
            $orders = Order::where('user_id', Auth::id())->get();
        }
        return view('layouts.orders.view', compact('orders', 'order_status', 'order_type'));
    }

    public function search() {
        $order_type = OrderType::all();
        $order_status = OrderStatus::All();
        $result = null;
        return view('layouts.orders.search', compact('order_type', 'order_status', 'result'));
    }

    public function search_result(SearchRequest $request) {
        $order_type = OrderType::all();
        $order_status = OrderStatus::All();

        $search_period = $request->input('period');
        $search_status = $request->input('status');
        $search_type = $request->input('type');

        $search_period_start = $request->input('start_date');
        $search_period_stop = $request->input('stop_date');

        if ($search_period == 1) {
            $result = Order::whereBetween('created_at', [
                Carbon::parse($search_period_start),
                Carbon::parse($search_period_stop),
            ])->where('order_status', $search_status)->where('order_type', $search_type)->get();

        } else if($search_period == 2) {
            $result = Order::whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->where('order_status', $search_status)->where('order_type', $search_type)->get();
        } else if($search_period == 3) {
            $thisMonth = (string) Carbon::now()->month;

            $result = Order::whereMonth('created_at', $thisMonth)->where('order_status', $search_status)->where('order_type', $search_type)->get();
        }

        return view('layouts.orders.search_result', compact('order_type', 'order_status', 'result', 'search_period', 'search_status', 'search_type', 'search_period_start', 'search_period_stop'));
    }

}
