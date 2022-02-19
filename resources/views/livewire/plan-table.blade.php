<div>
    <!-- Landing -->
    <section id="landing">
        <div class="container">
            <div class="row-container">
                <div class="row-one">
                    <div class="row justify-content-between g-4">
                        <div class="col-md-6 col-xl-3">
                            <div wire:ignore class="row justify-content-between align-items-center">
                                <div class="col-5">
                                    <strong class="input-headline">RAM Size</strong>
                                </div>
                                <div class="col-7 text-end text-nowrap">
                                    <div class="min-max-number" id="ram-min"></div>
                                    <div class="min-max-number">-</div>
                                    <div class="min-max-number" id="ram-max"></div>
                                </div>
                                <div class="col-12 rng">
                                    <div id="ram-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div wire:ignore class="row justify-content-between align-items-center">
                                <div class="col-4">
                                    <strong class="input-headline">Disk Size</strong>
                                </div>
                                <div class="col-8 text-end">
                                    <div class="min-max-number" id="disk-min"></div>
                                    <div class="min-max-number">-</div>
                                    <div class="min-max-number" id="disk-max"></div>
                                </div>
                                <div class="col-12 rng">
                                    <div id="disk-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <strong class="input-headline">Disk Type</strong>
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
                        <div wire:ignore class="col-md-6 col-xl-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-6 text-nowrap">
                                    <strong class="input-headline">CPU Core Count</strong>
                                </div>
                                <div class="col-6 text-end text-nowrap">
                                    <div class="min-max-number" id="cpu-min"></div>
                                    <div class="min-max-number">-</div>
                                    <div class="min-max-number" id="cpu-max"></div>
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
                    <div class="row justify-content-between g-4">
                        <div wire:ignore class="col-md-6 col-lg-3">
                            <div class="country-container">
                                <strong class="input-headline">Country</strong>
                            </div>

                            <div class="form-item">
                                <input id="country_selector" data-countries="{{json_encode($options['countries'])}}" type="text" />
                                <label for="country_selector" style="display: none"
                                >Select a country here...</label
                                >
                            </div>
                        </div>
                        <div wire:ignore class="col-md-6 col-lg-3">
                            <strong class="input-headline">Technology</strong>
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
                            <strong class="input-headline">Payment Options</strong>
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
                                    <strong class="input-headline">Crypto Friendly</strong>
                                </div>
                                <div class="radio-input-container row">
                                    <div class="col-6">
                                        <label class="radio-input">
                                            <input type="radio" name="crypto_friendly" wire:model.defer="filter.cryptoFriendly" value="1" />
                                            <span>Yes</span>
                                        </label>
                                    </div>

                                    <div class="col-6">
                                        <label class="radio-input">
                                            <input type="radio" name="crypto_friendly"  wire:model.defer="filter.cryptoFriendly" value="0" />
                                            <span>No</span>
                                        </label>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label class="radio-input">
                                            <input type="radio" name="crypto_friendly"  wire:model.defer="filter.cryptoFriendly" value="0" />
                                            <span class="with-image">
                                                <img src="{{asset('img/btcpay.svg')}}" alt="BtcPayServer"> BtcPayServer
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="hr-two" />
                
                <div class="third-row">
                    <div class="row justify-content-between g-4">
                        <div class="col-md-6 col-xl-2">
                            <strong class="input-headline">Traffic</strong>
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
                        
                        <div class="col-md-6 col-xl-2">
                            <strong class="input-headline">Sorting</strong>
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

                        <div class="col-md-12 col-xl-5">
                            <div wire:ignore class="row justify-content-between align-items-center">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <strong class="input-headline">Price <span>(monthly)</span></strong>
                                        </div>
                                        
                                        <div class="col-6 text-end">
                                            <div class="min-max-number" id="price-min"></div>
                                            <div class="min-max-number">-</div>
                                            <div class="min-max-number" id="price-max"></div>
                                        </div>
                                
                                        <div class="col-12 rng">
                                            <div id="price-range"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-2 mt-2">
                                    <label for="" class="form-label">Min</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control price-range-min-max" id="">
                                    </div>
                                </div>

                                <div class="col-6 col-sm-2 mt-2">
                                    <label for="" class="form-label">Max</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control price-range-min-max" id="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form id="search-form" data-id="{{$this->id}}" wire:submit.prevent="search" class="col-md-12 col-xl-3">
                            <div class="landing-btn">
                                <button class="btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Landing -->

    <!-- Start pages -->
    <section id="pages">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12">
                    <h1>Lorem Ipsum</h1>
                </div>
            </div>
            {{ $plans->links('components.table.pagination') }}
        </div>
    </section>

    <!-- Table  -->
    <section id="table">
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
                                            <strong>$ {{number_format($plan->price_usd, 2)}}</strong>
                                            <br> € {{number_format($plan->price_eur, 2)}}
                                            <br> ₽ {{number_format($plan->price_rub, 0)}}
                                        @break
                                        @case('eur')
                                            $ {{number_format($plan->price_usd, 2)}}
                                            <br> <strong>€ {{number_format($plan->price_eur, 2)}}</strong>
                                            <br> ₽ {{number_format($plan->price_rub, 0)}}
                                        @break
                                        @case('rub')
                                            $ {{number_format($plan->price_usd, 2)}}
                                            <br> € {{number_format($plan->price_eur, 2)}}
                                            <br> <strong>₽ {{number_format($plan->price_rub, 0)}}</strong>
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
    </section>

    <!-- Bottom pages -->
    <section id="pages" class="bottom-pages">
        <div class="container pt-4 pb-lg-0">
            {{ $plans->links('components.table.pagination') }}
        </div>
    </section>

</div>
