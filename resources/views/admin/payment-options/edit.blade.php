@extends('layouts.app')

@section('content')
    @livewire('admin.payment-option-form', ['paymentOption' => $paymentOption])
@endsection
