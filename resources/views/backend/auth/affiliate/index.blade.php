@extends('backend.layouts.app')

@section('title', __('Affiliate'))

@section('breadcrumb-links')
    @include('backend.auth.affiliate.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Affiliates')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.affiliates-table />
        </x-slot>
    </x-backend.card>
@endsection
