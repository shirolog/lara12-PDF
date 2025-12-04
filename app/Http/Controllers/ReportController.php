<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report1(Payment $payment) {

        $pdf = PDF::loadView('report.report1', compact('payment'));

        return $pdf->stream('payment_receipt.pdf');
        
    }
}
