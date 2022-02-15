<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.companies.index');
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', [
            'company' => $company
        ]);
    }
}
