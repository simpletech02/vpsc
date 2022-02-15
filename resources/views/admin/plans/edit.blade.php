@extends('layouts.app')

@section('content')
    @livewire('admin.plan-form', ['plan' => $plan])
@endsection
