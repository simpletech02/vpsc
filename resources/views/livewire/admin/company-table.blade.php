<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-primary" href="{{route('admin.companies.create')}}">
            <i class="bi bi-plus-lg"></i>
            Add
        </a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <x-table.th sorting="id">ID</x-table.th>
            <x-table.th sorting="company_id">Company ID</x-table.th>
            <x-table.th sorting="name">Name</x-table.th>
            <x-table.th sorting="link">Link</x-table.th>
            <x-table.th sorting="logo">Logo</x-table.th>
            <x-table.th sorting="virtualization">Virtualization</x-table.th>
            <x-table.th sorting="primary_currency">Primary Currency</x-table.th>
            <x-table.th sorting="crypto_friendly" class="text-center">Crypto friendly</x-table.th>
            <x-table.th sorting="dt_added">Added</x-table.th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr wire:key="{{$company->id}}">
                <th scope="row">{{$company->id}}</th>
                <td>{{$company->company_id}}</td>
                <td>{{$company->name}}</td>
                <td><a href="{{$company->link}}" target="_blank">{{$company->link}}</a></td>
                <td>{{$company->logo}}</td>
                <td>{{$company->virtualization}}</td>
                <td>{{strtoupper($company->primary_currency)}}</td>
                <td class="text-center">
                    @if($company->crypto_friendly)
                        <i class="bi bi-check-square"></i>
                    @else
                        <i class="bi bi-square"></i>
                    @endif
                </td>
                <td>{{optional($company->dt_added)->toDateTimeString()}}</td>
                <td class="text-end">
                    <a href="{{route('admin.companies.edit', ['company' => $company->id])}}" class="btn btn-outline">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
</div>
