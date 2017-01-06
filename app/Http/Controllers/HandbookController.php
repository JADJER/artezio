<?php

namespace App\Http\Controllers;

use App\CashCode;
use App\ColectorService;
use App\FrequencyCollector;
use App\MethodDelivery;
use App\OrderType;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class HandbookController extends Controller {

    use AuthenticatesUsers;

    public function __construct() {
        $this->middleware('auth');
    }

    public function handbook() {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            return view('layouts.profile.handbook.view');
        } else {
            return redirect('/');
        }
    }

    public function edit($key) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = ColectorService::All();
                    return view('layouts.profile.handbook.edit', compact('handbook', 'key'));
                case 'order_type' :
                    $handbook = OrderType::All();
                    return view('layouts.profile.handbook.edit', compact('handbook', 'key'));
                case 'method_delivery' :
                    $handbook = MethodDelivery::All();
                    return view('layouts.profile.handbook.edit', compact('handbook', 'key'));
                case 'frequency_collectors' :
                    $handbook = FrequencyCollector::All();
                    return view('layouts.profile.handbook.edit', compact('handbook', 'key'));
                case 'cash_code' :
                    $handbook = CashCode::All();
                    return view('layouts.profile.handbook.edit', compact('handbook', 'key'));
                case '' :
                    return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function create($key) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            if (empty($key)) {
                return redirect('/');
            } else {
                return view('layouts.profile.handbook.create', compact('key'));
            }
        } else {
            return redirect('/');
        }
    }

    public function edit_row($key, $id) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = ColectorService::find($id);
                    return view('layouts.profile.handbook.edit_row', compact('handbook', 'key'));
                case 'order_type' :
                    $handbook = OrderType::find($id);
                    return view('layouts.profile.handbook.edit_row', compact('handbook', 'key'));
                case 'method_delivery' :
                    $handbook = MethodDelivery::find($id);
                    return view('layouts.profile.handbook.edit_row', compact('handbook', 'key'));
                case 'frequency_collectors' :
                    $handbook = FrequencyCollector::find($id);
                    return view('layouts.profile.handbook.edit_row', compact('handbook', 'key'));
                case 'cash_code' :
                    $handbook = CashCode::find($id);
                    return view('layouts.profile.handbook.edit_row', compact('handbook', 'key'));
                case '' :
                    return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function save(Request $request, $key) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = new ColectorService;
                    break;
                case 'order_type' :
                    $handbook = new OrderType;
                    break;
                case 'method_delivery' :
                    $handbook = new MethodDelivery;
                    break;
                case 'frequency_collectors' :
                    $handbook = new FrequencyCollector;
                    break;
                case 'cash_code' :
                    $handbook = new CashCode;
                    break;
                case '' :
                    return redirect('/');
                    break;
            }

            $handbook->name = $request->input('name');
            $handbook->save();
            return redirect('/handbook/edit/' . $key);

        } else {
            return redirect('/');
        }
    }

    public function delete($key, $id) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = ColectorService::find($id);
                    break;
                case 'order_type' :
                    $handbook = OrderType::find($id);
                    break;
                case 'method_delivery' :
                    $handbook = MethodDelivery::find($id);
                    break;
                case 'frequency_collectors' :
                    $handbook = FrequencyCollector::find($id);
                    break;
                case 'cash_code' :
                    $handbook = CashCode::find($id);
                    break;
                case '' :
                    return redirect('/');
            }

            $handbook->delete();
            return redirect('/handbook/edit/' . $key);

        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $key, $id) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = ColectorService::find($id);
                    break;
                case 'order_type' :
                    $handbook = OrderType::find($id);
                    break;
                case 'method_delivery' :
                    $handbook = MethodDelivery::find($id);
                    break;
                case 'frequency_collectors' :
                    $handbook = FrequencyCollector::find($id);
                    break;
                case 'cash_code' :
                    $handbook = CashCode::find($id);
                    break;
                case '' :
                    return redirect('/');
            }

            $handbook->name = $request->input('name');
            $handbook->save();
            return redirect('/handbook/edit/' . $key);

        } else {
            return redirect('/');
        }
    }
}
