<div>
    <!-- Landing -->
    <div id="landing">
        <div class="container">
            <div class="row-container">
                <div class="row-one">
                    <div class="row justify-content-between g-5">
                        <div class="col-md-6 col-lg-3">
                            <div wire:ignore class="row justify-content-between align-items-center">
                                <div class="col-6">
                                    <h2>RAM Size</h2>
                                </div>
                                <div class="col-6 text-end text-nowrap">
                                    <h3 id="ram-min"></h3>
                                    <h3>-</h3>
                                    <h3 id="ram-max"></h3>
                                </div>
                                <div class="col-12 rng">
                                    <div id="ram-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div wire:ignore class="row justify-content-between align-items-center">
                                <div class="col-6">
                                    <h2>Disk Size</h2>
                                </div>
                                <div class="col-6 text-end">
                                    <h3 id="disk-min"></h3>
                                    <h3>-</h3>
                                    <h3 id="disk-max"></h3>
                                </div>
                                <div class="col-12 rng">
                                    <div id="disk-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h2>Disk Type</h2>
                            <div>
                                <select
                                    class="form-select"
                                    aria-label="Default select example"
                                    wire:model.defer="filter.diskType"
                                >
                                    <option wire:key="no-disk-type-selection" value="" selected>Select</option>
                                    @foreach($options['diskTypes'] as $optionDiskType)
                                        <option wire:key="select-{{$optionDiskType}}" value="{{$optionDiskType}}">{{$optionDiskType}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div wire:ignore class="col-md-6 col-lg-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-6 text-nowrap">
                                    <h2>CPU Core Count</h2>
                                </div>
                                <div class="col-6 text-end text-nowrap">
                                    <h3 id="cpu-min"></h3>
                                    <h3>-</h3>
                                    <h3 id="cpu-max"></h3>
                                </div>
                                <div class="col-12 rng">
                                    <div id="cpu-range"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="second-row">
                    <div class="row justify-content-between g-5">
                        <div wire:ignore class="col-md-6 col-lg-3">
                            <div class="country-container">
                                <h2>Country</h2>
                            </div>

                            <div class="form-item">
                                <input id="country_selector" data-countries="{{json_encode($options['countries'])}}" type="text" />
                                <label for="country_selector" style="display: none"
                                >Select a country here...</label
                                >
                            </div>
                        </div>
                        <div wire:ignore class="col-md-6 col-lg-3">
                            <h2>Technology</h2>
                            <div>
                                <select
                                    class="form-select"
                                    aria-label="Select technology"
                                    wire:model.defer="filter.technology"
                                    wire:key="technology-select"
                                >
                                    <option wire:key="no-selected-technologie" value="" selected>Select</option>
                                    @foreach($options['technologies'] as $technology)
                                        <option wire:key="select-{{$technology}}" value="{{$technology}}">{{$technology}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h2>Payment Options</h2>
                            <div>
                                <select
                                    class="form-select"
                                    aria-label="Default select example"
                                    wire:model.defer="filter.paymentOption"
                                    wire:key="payment-option-select"
                                >
                                    <option wire:key="no-payment-option-selection" value="" selected>Select</option>
                                    @foreach($options['paymentOptions'] as $optionId => $paymentOptionName)
                                        <option wire:key="select-{{$optionId}}" value="{{$optionId}}">{{$paymentOptionName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="crypto">
                                <div class="col-12">
                                    <h2>Crypto Friendly</h2>
                                </div>
                                <div class="radio-input-container">
                                    <label class="radio-input">
                                        <input type="radio" name="crypto_friendly" wire:model.defer="filter.cryptoFriendly" value="1" />
                                        <span>Yes</span>
                                    </label>
                                    <label class="radio-input">
                                        <input type="radio" name="crypto_friendly"  wire:model.defer="filter.cryptoFriendly" value="0" />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr-two" />
                <div class="third-row">
                    <div class="row justify-content-between g-5">
                        <div class="col-md-6 col-lg-3">
                            <h2>Traffic</h2>
                            <div>
                                <select
                                    class="form-select"
                                    aria-label="Select Traffic"
                                    wire:model.defer="filter.traffic"
                                >
                                    <option value="" wire:key="no-traffic-selected" selected>Select</option>
                                    @foreach($options['traffics'] as $traffic)
                                        <option wire:key="select-{{$traffic}}" value="{{$traffic}}">{{$traffic}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div wire:ignore class="row justify-content-between align-items-center">
                                <div class="col-6">
                                    <h2>Price <span>(monthly)</span></h2>
                                </div>
                                <div class="col-6 text-end">
                                    <h3 id="price-min"></h3>
                                    <h3>-</h3>
                                    <h3 id="price-max"></h3>
                                </div>
                                <div class="col-12 rng">
                                    <div id="price-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h2>Sorting</h2>
                            <div>
                                <select
                                    class="form-select"
                                    aria-label="Default select example"
                                >
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <form id="search-form" data-id="{{$this->id}}" wire:submit.prevent="search" class="col-md-6 col-lg-3">
                            <div class="landing-btn">
                                <button class="btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing -->

    <!-- Start pages -->
    <div id="pages">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12">
                    <h1>Lorem Ipsum</h1>
                </div>
            </div>
            {{ $plans->links('components.table.pagination') }}
        </div>
    </div>

    <!-- Table  -->
    <div id="table">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <x-table.th sorting="name">COMPANY</x-table.th>
                        <x-table.th sorting="disk_size">DISK</x-table.th>
                        <x-table.th sorting="ram">MEMORY</x-table.th>
                        <x-table.th sorting="cpu_count">CPU</x-table.th>
                        <x-table.th sorting="traffic">TRAFFIC</x-table.th>
                        <x-table.th sorting="price_usd">PRICE</x-table.th>
                        <x-table.th>CRYPTO FRIENDLY</x-table.th>
                        <x-table.th>COUNTRY</x-table.th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="fix-hight-row"></tr>
                        @foreach($plans as $plan)
                            <tr wire:key="{{$plan->id}}">
                                <td>
                                    <div class="table-image-container">
                                        <img
                                            class="table-img img-fluid"
                                            src="{{asset('img/' . $plan->logo)}}"
                                            alt="{{$plan->name}}"
                                        />
                                    </div>
                                </td>
                                <td>{{$plan->disk_size}} GB {{$plan->disk_type}}</td>
                                <td>{{$plan->ram}} MB</td>
                                <td>{{$plan->cpu_count}}x{{$plan->cpu_mhz}} MHz</td>
                                <td>{{$plan->traffic}}</td>
                                <td>
                                    @switch($plan->currency_code)
                                        @case('usd')
                                            $ {{number_format($plan->price_usd, 2)}}
                                        @break
                                        @case('eur')
                                            € {{number_format($plan->price_eur, 2)}}
                                        @break
                                        @case('rub')
                                            ₽ {{number_format($plan->price_rub, 2)}}
                                        @break
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    @if($plan->crypto_friendly)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="img-container me-3 country-select">
                                            <div class="flag {{strtolower($plan->country_code)}}"></div>
                                        </div>
                                        <span>{{$plan->country_name}}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bottom pages -->
    <div id="pages" class="bottom-pages">
        <div class="container pt-4 pb-lg-0">
            {{ $plans->links('components.table.pagination') }}
        </div>
    </div>

</div>
