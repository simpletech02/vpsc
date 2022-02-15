<div class="container">

    <div class="card">
        <div class="card-header">
            @if($paymentOption->option_id)
                Update payment option
            @else
                Create new payment option
            @endif
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" wire:model.defer="paymentOption.name" class="form-control" id="name">
                    @error('paymentOption.name')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mt-4">
                    @if($paymentOption->option_id)
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
                    Are you sure you want to remove existing payment option?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="remove">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
