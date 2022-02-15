<div class="container">

    <div class="card">
        <div class="card-header">
            @if($country->id)
                Update company
            @else
                Create new company
            @endif
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">

                <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" wire:model.defer="country.name" class="form-control" id="name">
                    @error('country.name')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="d-lg-flex mt-2">
                    <div class="form-group col-12 col-lg-6 pe-lg-2">
                        <label for="country_code">Country code</label>
                        <input type="text" wire:model.defer="country.country_code" class="form-control" id="country_code" placeholder="us, ru, de ...">
                        @error('country.country_code')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-12 pt-2 col-lg-6 ps-lg-2 pt-lg-0">
                        <label for="currency_code">Currency code</label>
                        <input type="text" wire:model.defer="country.currency_code" class="form-control" id="currency_code" placeholder="usd, eur, rub ...">
                        @error('country.currency_code')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    @if($country->id)
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
                    Are you sure you want to remove existing country?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="remove">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
