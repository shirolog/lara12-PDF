<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index() {

        $payments = Payment::all();

        return view('payments.index', compact('payments'));
    }

    public function create() {

        $payments = Payment::all();
        
        $enrollments = Enrollment::all();

        return view('payments.create', compact('payments', 'enrollments'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[

            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $payment = new Payment();

        $payment->enrollment_id = $request->input('enrollment_id');
        $payment->paid_date = $request->input('paid_date');
        $payment->amount = $request->input('amount');
        $payment->save();

        return redirect()->route('payments.index')->with('flash_message', 'payment Added!');

    }

    public function show(Payment $payment) {

        $payments = Payment::all();

        return view('payments.show', compact('payment', 'payments'));
    }

    public function edit(Payment $payment) {

        $enrollments = Enrollment::all();

        return view('payments.edit', compact('payment', 'enrollments'));
    }


    public function update(Request $request, Payment $payment){

        
        $validator = Validator::make($request->all(),[

            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }


        $payment->enrollment_id = $request->input('enrollment_id');
        $payment->paid_date = $request->input('paid_date');
        $payment->amount = $request->input('amount');
        $payment->save();

        return redirect()->route('payments.index')->with('flash_message', 'payment Updated!');
    }

    public function destroy(Payment $payment) {

        $payment->delete();

        return redirect()->route('payments.index')->with('flash_message', 'payment Deleted!');
    }


}
