<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-primary" href="{{route('admin.payment-options.create')}}">
            <i class="bi bi-plus-lg"></i>
            Add
        </a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <x-table.th sorting="option_id">ID</x-table.th>
            <x-table.th sorting="name">Name</x-table.th>
            <x-table.th></x-table.th>
        </tr>
        </thead>
        <tbody>
            @foreach($paymentOptions as $paymentOption)
                <tr wire:key="{{$paymentOption->option_id}}">
                    <th scope="row">{{$paymentOption->option_id}}</th>
                    <td>{{$paymentOption->name}}</td>
                    <td class="text-end">
                        <a href="{{route('admin.payment-options.edit', ['paymentOption' => $paymentOption->option_id])}}" class="btn btn-outline">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $paymentOptions->links() }}
</div>
