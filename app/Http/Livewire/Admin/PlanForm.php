<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PlanForm extends Component
{
    /**
     * @var Plan
     */
    public $plan;
    public $optionCompanies = [];

    protected $rules = [
        'plan.company_id' => 'required|numeric',
        'plan.name'       => 'nullable|string',
        'plan.link'       => 'nullable|string',
        'plan.is_btcpay'  => 'nullable|boolean',
        'plan.disk_size'  => 'required|numeric',
        'plan.disk_type'  => 'required|string',
        'plan.ram'        => 'required|numeric',
        'plan.cpu_count'  => 'required|numeric',
        'plan.cpu_mhz'    => 'required|numeric',
        'plan.traffic'    => 'required|string',
        'plan.port_speed' => 'required|numeric',
        'plan.price_usd'  => 'required|numeric',
        'plan.price_eur'  => 'required|numeric',
        'plan.price_rub'  => 'required|numeric',
    ];

    public function mount(Plan $plan = null)
    {
        $this->plan = $plan;
        $this->optionCompanies = Company::query()
            ->orderBy('company_id')
            ->pluck('name', 'company_id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.plan-form');
    }

    public function save()
    {
        abort_unless(Auth::check(), 401);

        $this->validate();

        $this->plan->save();
        $this->redirectRoute('admin.plans');
    }

    public function remove()
    {
        abort_unless(Auth::check(), 401);

        $this->plan->delete();
        $this->redirectRoute('admin.plans');
    }
}
