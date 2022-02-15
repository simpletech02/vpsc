@extends('layouts.app')

@section('content')
    @livewire('admin.country-form', ['country' => $country])
@endsection
