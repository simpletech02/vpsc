<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use App\Traits\WithDataTable;
use Livewire\Component;

class CompanyTable extends Component
{
    use WithDataTable;

    public function render()
    {
        $query = Company::query();
        $this->withSorts($query);

        return view('livewire.admin.company-table', [
            'companies' => $query->paginate()
        ]);
    }
}
