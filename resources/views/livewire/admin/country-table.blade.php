<div class="container">
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-primary" href="{{route('admin.countries.create')}}">
            <i class="bi bi-plus-lg"></i>
            Add
        </a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <x-table.th sorting="id">ID</x-table.th>
            <x-table.th sorting="name" scope="col">Name</x-table.th>
            <x-table.th sorting="country_code" scope="col">Country code</x-table.th>
            <x-table.th sorting="currency_code" scope="col">Currency code</x-table.th>
            <x-table.th scope="col"></x-table.th>
        </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
                <tr wire:key="{{$country->id}}">
                    <th scope="row">{{$country->id}}</th>
                    <td>
                        <div class="country-select">
                            <div class="flag {{strtolower($country->country_code)}}"></div>
                        </div>
                        {{$country->name}}
                    </td>
                    <td>{{$country->country_code}}</td>
                    <td>{{$country->currency_code}}</td>
                    <td class="text-end">
                        <a href="{{route('admin.countries.edit', ['country' => $country->id])}}" class="btn btn-outline">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $countries->links() }}
</div>
