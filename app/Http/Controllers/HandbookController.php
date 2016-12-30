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
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'order_type' :
                    $handbook = new OrderType;
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'method_delivery' :
                    $handbook = new MethodDelivery;
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'frequency_collectors' :
                    $handbook = new FrequencyCollector;
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'cash_code' :
                    $handbook = new CashCode;
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case '' :
                    return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($key, $id) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = ColectorService::find($id);
                    $handbook->delete();
                    return redirect('/handbook/edit/' . $key);

                case 'order_type' :
                    $handbook = OrderType::find($id);
                    $handbook->delete();
                    return redirect('/handbook/edit/' . $key);

                case 'method_delivery' :
                    $handbook = MethodDelivery::find($id);
                    $handbook->delete();
                    return redirect('/handbook/edit/' . $key);

                case 'frequency_collectors' :
                    $handbook = FrequencyCollector::find($id);
                    $handbook->delete();
                    return redirect('/handbook/edit/' . $key);

                case 'cash_code' :
                    $handbook = CashCode::find($id);
                    $handbook->delete();
                    return redirect('/handbook/edit/' . $key);

                case '' :
                    return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $key, $id) {
        if (!Auth::guest() && Auth::user()->isAdmin) {
            switch($key) {
                case 'collector_service' :
                    $handbook = ColectorService::find($id);
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'order_type' :
                    $handbook = OrderType::find($id);
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'method_delivery' :
                    $handbook = MethodDelivery::find($id);
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'frequency_collectors' :
                    $handbook = FrequencyCollector::find($id);
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case 'cash_code' :
                    $handbook = CashCode::find($id);
                    $handbook->id = $request->input('id');
                    $handbook->name = $request->input('name');
                    $handbook->save();
                    return redirect('/handbook/edit/' . $key);

                case '' :
                    return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
