<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use App\Models\Country;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyForm extends Component
{
    use WithFileUploads;

    /**
     * @var \App\Models\Company
     */
    public $company;
    public $companyCountries = [];
    public $companyPaymentOptions = [];

    /**
     * @var \Livewire\TemporaryUploadedFile|null
     */
    public $newLogo;

    public $optionCountries = [];
    public $optionPaymentOptions = [];

    protected $rules = [
        'company.company_id'      => 'required|numeric',
        'company.name'            => 'required|string',
        'company.logo'            => 'required|string',
        'company.virtualization'  => 'required|string',
        'company.crypto_friendly' => 'nullable|boolean',
        'newLogo'                 => 'nullable|image'
    ];

    public function mount(Company $company = null)
    {
        $this->company = $company ?? new Company();
        $this->optionCountries = Country::query()->orderBy('name')->get()->toArray();
        $this->optionPaymentOptions = PaymentOption::query()->get()->toArray();
        $this->loadCompanyCountries();
        $this->loadCompanyPaymentOptions();
    }

    public function render()
    {
        return view('livewire.admin.company-form');
    }

    public function save()
    {
        abort_unless(Auth::check(), 401);

        $this->handleUploadedFile();
        $this->validate();

        // prepare company data
        if($this->company->crypto_friendly === null) {
            $this->company->crypto_friendly = false;
        }

        $this->company->save();
        $this->redirectRoute('admin.companies');
    }

    public function saveCountries()
    {
        abort_unless(Auth::check(), 401);

        $this->company->countries()->sync($this->companyCountries);
    }

    public function savePaymentOptions()
    {
        abort_unless(Auth::check(), 401);

        $this->company->paymentOptions()->sync($this->companyPaymentOptions);
    }

    public function remove()
    {
        abort_unless(Auth::check(), 401);

        $this->company->delete();
        $this->redirectRoute('admin.companies');
    }

    public function getLogoPreviewProperty()
    {
        if($this->newLogo) {
            return $this->newLogo->temporaryUrl();
        }
        if($this->company->logo) {
            return asset('img/' . $this->company->logo);
        }
        return null;
    }

    private function handleUploadedFile()
    {
        if($this->newLogo) {
            rename($this->newLogo->getRealPath(), public_path('img/' . $this->newLogo->getClientOriginalName()));
            $this->company->logo = $this->newLogo->getClientOriginalName();
            $this->reset('newLogo');
        }
    }

    private function loadCompanyCountries()
    {
        if($this->isNewCompany()) {
            return;
        }
        $this->companyCountries = $this->company->countries->pluck('id')->toArray();
    }

    private function loadCompanyPaymentOptions()
    {
        if($this->isNewCompany()) {
            return;
        }
        $this->companyPaymentOptions = $this->company->paymentOptions->pluck('option_id')->toArray();
    }

    /**
     * @return bool
     */
    private function isNewCompany(): bool
    {
        return empty($this->company->id);
    }
}
