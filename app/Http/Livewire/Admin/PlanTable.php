<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use App\Traits\WithDataTable;
use Livewire\Component;

class PlanTable extends Component
{
    use WithDataTable;

    public function render()
    {
        $query = Plan::query()->with('company');
        $this->withSorts($query);

        return view('livewire.admin.plan-table', [
            'plans' => $query
                ->paginate()
        ]);
    }
}
