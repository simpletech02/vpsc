<?php

namespace App\Http\Livewire\Admin;

use App\Models\Country;
use App\Traits\WithDataTable;
use Livewire\Component;

class CountryTable extends Component
{
    use WithDataTable;

    public function render()
    {
        $query = Country::query();
        $this->withSorts($query);

        return view('livewire.admin.country-table', [
            'countries' => $query
                ->paginate()
        ]);
    }
}
