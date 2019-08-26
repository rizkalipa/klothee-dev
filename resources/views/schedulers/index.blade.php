@extends('layouts.dashboard')

@section('title', 'Scheduler')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/calendar.css') }}">
@endpush

@section('content')
<div class="container mt-4 p-3">
    <div class="row">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white inline-content-between">
                    <h4><span class="highlight"><i class="far fa-calendar-alt mr-3"></i></span> {{ now()->format('F, Y') }}</h4>
                    <div class="badge badge-danger d-flex align-items-center"><em>No Plan</em></div>
                </div>
                <div class="card-body">
                    @component('components.calendar') 

                    @endcomponent
                </div>
                <div class="card-footer bg-white border-0">
                    <h5 class="card-title">Schedule This Month :</h5>
                    <div class="calendar-note">
                        <hr>
                        <em>No Schedule This Month</em>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight"><i class="fas fa-edit mr-3"></i></span> Meeting Planner</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="place">Place</label>
                            <input type="text" name="place" class="form-control @error('place') is-invalid @enderror" placeholder="Where..." autocomplete="off">
                            @if($errors->has('place'))
                                <small class="text-danger">{{ $errors->first('place') }}</small><br>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="meeting_purpose">Meeting Purpose</label>
                            <textarea name="meeting_purpose" id="meeting_purpose" cols="3" rows="3" class="form-control @error('place') is-invalid @enderror" placeholder="What to Discuss..."></textarea>
                            @if($errors->has('meeting_purpose'))
                                <small class="text-danger">{{ $errors->first('meeting_purpose') }}</small><br>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="date">Pick a Date</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                            @if($errors->has('date'))
                                <small class="text-danger">{{ $errors->first('date') }}</small><br>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md">
                                    <label>Time</label>
                                    <select name="time_hour" class="custom-select @error('time_hour') is-invalid @enderror">
                                        @for($i = 7; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @if($errors->has('time_hour'))
                                        <small class="text-danger">{{ $errors->first('time_hour') }}</small><br>
                                    @endif
                                </div>
                                <div class="col-md">
                                    <label>Minute</label>
                                    <select name="time_minute" class="custom-select @error('time_hour') is-invalid @enderror">
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" name="note" class="form-control @error('note') is-invalid @enderror" placeholder="Time Specific or Building Floor" autocomplete="off">
                            @if($errors->has('note'))
                                <small class="text-danger">{{ $errors->first('note') }}</small><br>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn px-4 btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection