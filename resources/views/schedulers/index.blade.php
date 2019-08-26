@extends('layouts.dashboard')

@section('title', 'Scheduler')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/calendar.css') }}">
@endpush

@section('content')
<div class="container mt-4 p-3">
    <div class="row">
        <div class="col-lg">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @component('components.calendar') 
                    
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    Hello {{ now()->daysInMonth }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection