<?php

namespace App\Http\Livewire\Admin;

use App\Models\PaymentOption;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PaymentOptionForm extends Component
{
    /**
     * @var PaymentOption
     */
    public $paymentOption;

    protected $rules = [
        'paymentOption.name' => 'required|string',
    ];

    public function mount(PaymentOption $paymentOption = null)
    {
        $this->paymentOption = $paymentOption ?? new PaymentOption();
    }

    public function render()
    {
        return view('livewire.admin.payment-option-form');
    }

    public function save()
    {
        abort_unless(Auth::check(), 401);

        $this->validate();
        $this->paymentOption->save();
        $this->redirectRoute('admin.payment-options');
    }

    public function remove()
    {
        abort_unless(Auth::check(), 401);

        $this->paymentOption->delete();
        $this->redirectRoute('admin.payment-options');
    }
}
