<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentOption;

class PaymentOptionController extends Controller
{
    public function index()
    {
        return view('admin.payment-options.index');
    }

    public function create()
    {
        return view('admin.payment-options.create');
    }

    public function edit(PaymentOption $paymentOption)
    {
        return view('admin.payment-options.edit', [
            'paymentOption' => $paymentOption
        ]);
    }
}
