<?php

namespace App\Http\Livewire\Admin;

use App\Models\PaymentOption;
use App\Traits\WithDataTable;
use Livewire\Component;

class PaymentOptionTable extends Component
{
    use WithDataTable;

    public function render()
    {
        $query = PaymentOption::query();
        $this->withSorts($query);

        return view('livewire.admin.payment-option-table', [
            'paymentOptions' => $query
                ->paginate()
        ]);
    }
}
