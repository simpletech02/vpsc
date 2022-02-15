<div class="container">

    <div wire:key="company-form" class="card">
        <div class="card-header">
            @if($company->id)
                Update company
            @else
                Create new company
            @endif
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="company_id">Company id</label>
                    <input type="text" wire:model.defer="company.company_id" class="form-control" id="company_id">
                    @error('company.company_id')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" wire:model.defer="company.name" class="form-control" id="name">
                    @error('company.name')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="logo">Logo</label>
                    <input type="file" wire:model.defer="newLogo" class="form-control-file" id="logo">
                    @error('newLogo')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                    @if($this->logo_preview)
                        <img wire:key="logo-preview" src="{{$this->logo_preview}}" alt=""/>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="virtualization">Virtualization</label>
                    <input type="text" wire:model.defer="company.virtualization" class="form-control" id="virtualization">
                    @error('company.virtualization')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-check mt-2">
                    <input type="checkbox" wire:model.defer="company.crypto_friendly" class="form-check-input" id="crypto_friendly">
                    <label class="form-check-label" for="crypto_friendly">Crypto friendly</label>
                </div>

                <div class="mt-4">
                    @if($company->id)
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#removeModal">
                            Remove
                        </button>
                    @endif
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    @if($company->id)
        <div wire:key="company-countries" class="card mt-4">
            <div class="card-header">
                Manage company countries
            </div>
            <div class="card-body">
                <form wire:submit.prevent="saveCountries">
                    <div class="form-group">
                        <label for="companyCountries">Select countries</label>
                        <select wire:model.defer="companyCountries" multiple size="{{count($optionCountries)}}" class="form-control" id="companyCountries">
                            @foreach($optionCountries as $optionCountry)
                                <option wire:key="country-select-{{$optionCountry['id']}}" value="{{$optionCountry['id']}}">
                                    {{$optionCountry['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div wire:key="company-payment-options" class="card mt-4">
            <div class="card-header">
                Manage company payment options
            </div>
            <div class="card-body">
                <form wire:submit.prevent="savePaymentOptions">
                    <div class="form-group">
                        <label for="companyCountries">Select payment options</label>
                        <select wire:model.defer="companyPaymentOptions" multiple size="{{count($optionPaymentOptions)}}" class="form-control" id="companyCountries">
                            @foreach($optionPaymentOptions as $optionPaymentOption)
                                <option wire:key="payment-option-select-{{$optionPaymentOption['option_id']}}" value="{{$optionPaymentOption['option_id']}}">
                                    {{$optionPaymentOption['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal -->
        <div wire:key="company-delete-modal"  class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removeModalLabel">Remove confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to remove existing company?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" wire:click="remove">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
