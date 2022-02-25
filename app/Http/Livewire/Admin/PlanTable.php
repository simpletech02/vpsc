<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use App\Models\Company;
use App\Traits\WithDataTable;
use Livewire\Component;

class PlanTable extends Component
{
    use WithDataTable;

    public $company;
    protected $queryString = ['company'];

    public function render()
    {
        $query = Plan::query()->with('company');
        if ($this->company) {
            $query = $query->where('company_id', $this->company);
        }
        $this->withSorts($query);

        return view('livewire.admin.plan-table', [
            'plans' => $query->paginate(),
            'companies' => Company::all()
        ]);
    }
}
