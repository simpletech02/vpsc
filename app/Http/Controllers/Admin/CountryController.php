<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{

    public function index()
    {
        return view('admin.countries.index');
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', [
            'country' => $country
        ]);
    }
}
