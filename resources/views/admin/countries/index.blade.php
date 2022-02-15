@extends('layouts.app')

@section('content')
    @livewire('admin.country-table')
@endsection

@push('styles')
    <link href="{{ asset('css/countrySelect.min.css') }}" rel="stylesheet">
@endpush
