<div class="container">

    <div class="card">
        <div class="card-header">
            @if($plan->plan_id)
                Update plan
            @else
                Create new plan
            @endif
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" novalidate>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select wire:model.defer="plan.company_id" class="form-control" id="company_id">
                        <option wire:key="company-select-empty" value="">Select company</option>
                        @foreach($optionCompanies as $companyId => $optionCompany)
                            <option wire:key="company-select-{{$companyId}}" value="{{$companyId}}">
                                {{$companyId}} {{$optionCompany}}
                            </option>
                        @endforeach
                    </select>
                    @error('plan.company_id')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="d-lg-flex mt-2">
                    <div class="form-group col-12 col-lg-4 pe-lg-2">
                        <label for="disk_size">Disk size</label>
                        <input type="number" wire:model.defer="plan.disk_size" class="form-control" id="disk_size">
                        @error('plan.disk_size')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-lg-4 px-lg-2 pt-2 pt-lg-0">
                        <label for="disk_type">Disk type</label>
                        <input type="text" wire:model.defer="plan.disk_type" class="form-control" id="disk_type">
                        @error('plan.disk_type')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 pt-2 col-lg-4 ps-lg-2 pt-lg-0">
                        <label for="ram">RAM</label>
                        <input type="number" wire:model.defer="plan.ram" class="form-control" id="ram">
                        @error('plan.ram')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="d-lg-flex mt-2">
                    <div class="form-group col-12 col-lg-6 pe-lg-2">
                        <label for="cpu_count">CPU count</label>
                        <input type="number" wire:model.defer="plan.cpu_count" class="form-control" id="cpu_count">
                        @error('plan.cpu_count')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 pt-2 col-lg-6 ps-lg-2 pt-lg-0">
                        <label for="cpu_mhz">CPU mhz</label>
                        <input type="number" wire:model.defer="plan.cpu_mhz" class="form-control" id="cpu_mhz">
                        @error('plan.cpu_mhz')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="d-lg-flex mt-2">
                    <div class="form-group col-12 col-lg-6 pe-lg-2">
                        <label for="traffic">Traffic</label>
                        <input type="text" wire:model.defer="plan.traffic" class="form-control" id="traffic">
                        @error('plan.traffic')
                            <div class="invalid-feedback d-block">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 pt-2 col-lg-6 ps-lg-2 pt-lg-0">
                        <label for="port_speed">Port speed</label>
                        <input type="number" wire:model.defer="plan.port_speed" class="form-control" id="port_speed">
                        @error('plan.port_speed')
                            <div class="invalid-feedback d-block">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="d-lg-flex mt-2">
                    <div class="form-group col-12 col-lg-4 pe-lg-2">
                        <label for="price_usd">Price USD</label>
                        <input type="number" wire:model.defer="plan.price_usd" class="form-control" placeholder="$" id="price_usd">
                        @error('plan.price_usd')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-lg-4 px-lg-2 pt-2 pt-lg-0">
                        <label for="price_eur">Price EUR</label>
                        <input type="number" wire:model.defer="plan.price_eur" class="form-control" placeholder="€" id="price_eur">
                        @error('plan.price_eur')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-lg-4 ps-lg-2 pt-2 pt-lg-0">
                        <label for="price_rub">Price RUB</label>
                        <input type="number" wire:model.defer="plan.price_rub" class="form-control" placeholder="₽" id="price_rub">
                        @error('plan.price_rub')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    @if($plan->plan_id)
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal">
                            Remove
                        </button>
                    @endif
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeModalLabel">Remove confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove existing plan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="remove">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
