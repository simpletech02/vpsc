@extends('layouts.app')

@section('content')
    @livewire('admin.company-form', ['company' => $company])
@endsection
