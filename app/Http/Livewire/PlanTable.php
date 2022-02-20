<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Country;
use App\Models\PaymentOption;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class PlanTable extends Component
{
    use WithPagination;

    public $filter = [];
    public $options = [
        'ram'       => ['min' => null, 'max' => null],
        'cpuCount'  => ['min' => null, 'max' => null],
        'diskTypes' => [],
        'traffics' => [],
        'countries' => [],
        'technologies' => []
    ];
    public $optionDiskTypes = [];

    public $selectedPage;
    public $sorts = [];
    public $view = 10;


    protected $queryString = [
        'view' => ['except' => 10]
    ];

    public function mount()
    {
        $result = Plan::query()
            ->selectRaw('
                min(ram) as ram_min,
                max(ram) as ram_max,
                min(disk_size) as disk_min,
                max(disk_size) as disk_max,
                min(cpu_count) as cpu_count_min,
                max(cpu_count) as cpu_count_max,
                min(price_usd) as price_min,
                max(price_usd) as price_max
            ')
            ->first();

        $diskSizeRange = ['min' => $result->disk_min ?? 0, 'max' => $result->disk_max ?? 0];
        $this->options['diskSize'] = $diskSizeRange;
        $this->filter['diskSize'] = $diskSizeRange;

        $ramRange = ['min' => $result->ram_min ?? 0, 'max' => $result->ram_max ?? 0];
        $this->options['ram'] = $ramRange;
        $this->filter['ram'] = $ramRange;

        $cpuCountRange = ['min' => $result->cpu_count_min ?? 0, 'max' => $result->cpu_count_max ?? 0];
        $this->options['cpuCount'] = $cpuCountRange;
        $this->filter['cpuCount'] = $cpuCountRange;

        $priceRange = ['min' => $result->price_min ?? 0, 'max' => $result->price_max ?? 0];
        $this->options['price'] = $priceRange;
        $this->filter['price'] = $priceRange;

        $this->options['diskTypes'] = Plan::query()
            ->distinct()
            ->select('disk_type')
            ->get()
            ->map(function (Plan $plan) {
                return $plan->disk_type;
            })->toArray();
        $this->options['traffics'] = Plan::query()
            ->distinct()
            ->select('traffic')
            ->orderByRaw('length(traffic)')
            ->get()
            ->map(function (Plan $plan) {
                return $plan->traffic;
            })->toArray();

        $this->options['paymentOptions'] = PaymentOption::query()
            ->pluck('name', 'option_id')
            ->toArray();

        $this->options['countries'] = Country::query()->pluck('country_code')->prepend('xn')->toArray();
        $this->options['technologies'] = Company::query()->distinct()->pluck('virtualization')->toArray();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function updatedView()
    {
        $this->resetPage();
    }

    public function changeSort(string $field)
    {
        if (($this->sorts[$field] ?? null) === null) {
            $this->sorts[$field] = 'desc';
        } elseif ($this->sorts[$field] === 'desc') {
            $this->sorts[$field] = 'asc';
        } else {
            unset($this->sorts[$field]);
        }
    }

    public function goToSelectedPage()
    {
        if (empty($this->selectedPage)) {
            return;
        }

        $this->setPage($this->selectedPage);
        $this->reset('selectedPage');
    }

    public function render()
    {
        return view('livewire.plan-table', [
            'plans' => Plan::query()
                ->selectRaw('
                    plans.*,
                    companies.name,
                    companies.link,
                    companies.logo,
                    companies.primary_currency,
                    companies.company_id,
                    companies.virtualization,
                    companies.crypto_friendly,
                    countries.country_code,
                    countries.name as country_name
                ')
                ->join('companies', 'companies.company_id', '=', 'plans.company_id')
                ->join('company_country', 'companies.company_id', '=', 'company_country.company_id')
                ->join('countries', 'company_country.country_id', '=', 'countries.id')
                ->unless(empty($this->sorts), function (Builder $builder) {
                    foreach ($this->sorts as $sort => $direction) {
                        $builder->orderBy($sort, $direction);
                    }
                })
                ->unless(empty($this->filter), function (Builder $builder) {
                    // set ram filter
                    if (isset($this->filter['ram']['min'])) {
                        $builder->where('ram', '>=', $this->filter['ram']['min']);
                    }
                    if (isset($this->filter['ram']['max'])) {
                        $builder->where('ram', '<=', $this->filter['ram']['max']);
                    }

                    // set ram filter
                    if (isset($this->filter['diskSize']['min'])) {
                        $builder->where('disk_size', '>=', $this->filter['diskSize']['min']);
                    }
                    if (isset($this->filter['diskSize']['max'])) {
                        $builder->where('disk_size', '<=', $this->filter['diskSize']['max']);
                    }

                    // set disk type filter
                    if(!empty($this->filter['diskType'])) {
                        $builder->where('disk_type', $this->filter['diskType']);
                    }

                    // set cpu code count filter
                    if (isset($this->filter['cpuCount']['min'])) {
                        $builder->where('cpu_count', '>=', $this->filter['cpuCount']['min']);
                    }
                    if (isset($this->filter['cpuCount']['max'])) {
                        $builder->where('cpu_count', '<=', $this->filter['cpuCount']['max']);
                    }

                    // set country filter
                    if(!empty($this->filter['country']) && $this->filter['country'] != 'xn') {
                        $builder->where('country_code', $this->filter['country']);
                    }

                    // set country filter
                    if(!empty($this->filter['traffic'])) {
                        $builder->where('traffic', $this->filter['traffic']);
                    }

                    // set price filter
                    if (isset($this->filter['price']['min'])) {
                        $builder->where('price_usd', '>=', $this->filter['price']['min']);
                    }
                    if (isset($this->filter['price']['max'])) {
                        $builder->where('price_usd', '<=', $this->filter['price']['max']);
                    }

                    // set crypto friendly filter
                    if(isset($this->filter['cryptoFriendly']) && ($this->filter['cryptoFriendly'] == 0 || $this->filter['cryptoFriendly'] == 1)) {
                        $builder->where('crypto_friendly', $this->filter['cryptoFriendly']);
                    }

                    // set is BTCPay filter
                    if(isset($this->filter['isBTCPay'])) {
                        $isBTCPay = $this->filter['isBTCPay'] === true ? 1 : 0;
                        $builder->where('is_btcpay', $isBTCPay);
                    }

                    // set payment option filter
                    if(!empty($this->filter['paymentOption'] ?? [])) {
                        $builder->whereExists(function (\Illuminate\Database\Query\Builder $query) {
                            $query->select('companies.company_id')
                                ->from('companies')
                                ->join('company_payment_option',
                                    'companies.company_id',
                                    'company_payment_option.company_id'
                                )
                                ->join('payment_options',
                                    'company_payment_option.option_id',
                                    'payment_options.option_id'
                                )
                                ->where('payment_options.option_id', $this->filter['paymentOption']);
                        });
                    }

                    // set technology / virtualization filter
                    if(!empty($this->filter['technology'] ?? null)) {
                        $builder->where('virtualization', $this->filter['technology']);
                    }
                })
                ->paginate($this->view)->onEachSide(0)
        ]);
    }
}
