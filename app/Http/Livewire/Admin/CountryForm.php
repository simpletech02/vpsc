<?php

namespace App\Http\Livewire\Admin;

use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CountryForm extends Component
{
    /**
     * @var \App\Models\Country
     */
    public $country;

    protected $rules = [
        'country.name'          => 'required|string|max:255',
        'country.country_code'  => 'required|string|max:2',
        'country.currency_code' => 'required|string|max:3',
    ];

    public function mount(Country $country = null)
    {
        $this->country = $country ?? new Country();
    }

    public function render()
    {
        return view('livewire.admin.country-form');
    }

    public function save()
    {
        abort_unless(Auth::check(), 401);

        $this->validate();
        $this->country->save();
        $this->redirectRoute('admin.countries');
    }

    public function remove()
    {
        abort_unless(Auth::check(), 401);

        $this->country->delete();
        $this->redirectRoute('admin.countries');
    }
}
