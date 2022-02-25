<div class="container">
    <div class="row">
        <div class="col col-lg-4">
            <div class="input-group mb-3">
                <select class="form-select" wire:model="company" aria-label="Select entries for page">
                    <option value="">All Companies</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->company_id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="d-flex flex-row-reverse">
                <a class="btn btn-primary" href="{{route('admin.plans.create')}}">
                    <i class="bi bi-plus-lg"></i>
                    Add
                </a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <x-table.th sorting="id">ID</x-table.th>
            <x-table.th sorting="company_id">Company</x-table.th>
            <x-table.th sorting="name">Name</x-table.th>
            <x-table.th sorting="link">Link</x-table.th>
            <x-table.th sorting="disk_type">Disk type</x-table.th>
            <x-table.th sorting="disk_size">Disk size</x-table.th>
            <x-table.th sorting="ram">RAM</x-table.th>
            <x-table.th sorting="cpu_count">CPU count</x-table.th>
            <x-table.th sorting="cpu_mhz">CPU mhz</x-table.th>
            <x-table.th sorting="price_usd">Price</x-table.th>
            <x-table.th sorting="is_btcpay" class="text-center">Is BTCPay</x-table.th>
            <x-table.th sorting="dt_added">Added</x-table.th>
            <x-table.th></x-table.th>
        </tr>
        </thead>
        <tbody>
        @foreach($plans as $plan)
            <tr wire:key="{{$plan->plan_id}}">
                <th scope="row">{{$plan->plan_id}}</th>
                <td>{{$plan->company_id}} {{$plan->company?->name}}</td>
                <td>{{$plan->name}}</td>
                <td><a href="{{$plan->link}}" target="_blank">{{$plan->link}}</a></td>
                <td>{{$plan->disk_type}}</td>
                <td>{{$plan->disk_size}}</td>
                <td>{{$plan->ram}}</td>
                <td>{{$plan->cpu_count}}</td>
                <td>{{$plan->cpu_mhz}}</td>
                <td>
                    $ {{number_format($plan->price_usd, 2)}}<br/>
                    € {{number_format($plan->price_eur, 2)}}<br/>
                    ₽ {{number_format($plan->price_rub, 2)}}
                </td>
                <td class="text-center">
                    @if ($plan->is_btcpay)
                        <i class="bi bi-check-square"></i>
                    @else
                        <i class="bi bi-square"></i>
                    @endif
                </td>
                <td>{{optional($plan->dt_added)->toDateTimeString()}}</td>
                <td class="text-end">
                    <a href="{{route('admin.plans.edit', ['plan' => $plan->plan_id])}}" class="btn btn-outline">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $plans->links() }}
</div>
