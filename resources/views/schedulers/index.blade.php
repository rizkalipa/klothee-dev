@extends('layouts.dashboard')

@section('title', 'Scheduler')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/calendar.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success mb-2">{{ session('status') }}</div>
            @endif
            @if(filled($scheduleThisMonth))
                @if($scheduleThisMonth->first()->dateSchedule(now()->day))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <p style="font-size: 1rem">You Have Schedule <strong>Today!</strong></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            @endif
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white inline-content-between">
                    <h4><span class="highlight"><i class="far fa-calendar-alt mr-3"></i></span> {{ now()->format('F, Y') }}</h4>
                </div>
                <div class="card-body">
                    @if (filled($scheduleThisMonth->where('author_response', 'Accept')))
                        @include('components.calendar')
                    @else
                        @include('components.calendar-nodata')
                    @endif
                </div>
                <div class="card-footer bg-white border-0">
                    <h5 class="card-title">Schedule This Month :</h5>
                    <div class="calendar-note">
                        <hr>
                        @if(filled($scheduleThisMonth->where('author_response', 'Accept')))
                            @foreach($scheduleThisMonth as $schedule)
                                @if($schedule->author_response == 'Accept')
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <span class="highlight" style="font-size: 0.7rem"><i class="fas fa-circle"></i></span>
                                        </div>
                                        <div class="col-md-11 pr-4">
                                            <div class="inline-content-between">
                                                <p><strong>{{ $schedule->date_time->format('H:i | l, d F') }}</strong></p>
                                                <!-- Modal -->
                                                @include('components.modal', ['object' => $schedule])
                                            <p>Place : {{ $schedule->place  }}</p>
                                            <p class="mt-2">{{ $schedule->meeting_purpose }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        @else
                            <em>No Schedule This Month</em>
                            <hr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            @can('authorization')
                @if(filled($scheduleThisMonth->filter(function($schedule) { return $schedule->author_response == 'Waiting'; })))
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-4 highlight">Schedule Request</h5>
                            <hr>
                            @foreach($scheduleThisMonth as $schedule)
                                @if($schedule->author_response == 'Waiting')
                                    <div class="row mb-3">
                                        <div class="col-md-7">
                                            <p>{{ $schedule->user->name }}</p>
                                            <small><strong>Plan : </strong> {{ $schedule->meeting_purpose }}</small>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <p class="text-muted"><i class="fas fa-map-marker-alt"></i>{{ ' ' . $schedule->place }}</p>
                                            <small>{{ $schedule->date_time->format('l, d/m/y') }}</small>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4">
                                        <form action="{{ route('scheduler.response', ['id' => $schedule->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" name="response" value="Accept" class="btn btn-sm btn-primary mr-1">Accept</a>
                                                <button type="submit" name="response" value="Decline" class="btn btn-sm btn-danger">Decline</a>
                                        </form>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endcan
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight"><i class="fas fa-edit mr-3"></i></span> Meeting Planner</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('scheduler.store') }}" method="POST">
                        @csrf
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
                                        @for($i = 20; $i >= 7; $i--)
                                            <option value="{{ $i }}" {{ $i == 7 ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @if($errors->has('time_hour'))
                                        <small class="text-danger">{{ $errors->first('time_hour') }}</small><br>
                                    @endif
                                </div>
                                <div class="col-md">
                                    <label>Minute</label>
                                    <select name="time_minute" class="custom-select @error('time_hour') is-invalid @enderror">
                                            <option value="45">45</option>
                                            <option value="30">30</option>
                                            <option value="15">15</option>
                                            <option value="00" selected>00</option>
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
            {{-- Schedule status approve --}}
            <div class="card border-0 shadow-sm bg-primary mt-4">
                <div class="card-body">
                    <h5 class="mb-4 text-center"><em>Waiting For Response</em></h5>
                    @if(filled($scheduleThisMonth->filter(function($schedule) { return $schedule->author_response == 'Waiting'; })))
                        @foreach($scheduleThisMonth as $schedule)
                            @if($schedule->author_response == 'Waiting')
                                <div class="row mb-3">
                                    <div class="col-md-1">
                                        <span style="font-size: 0.7rem"><i class="fas fa-circle"></i></span>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $schedule->user->name }}</p>
                                        <small><strong>Plan : </strong> {{ $schedule->meeting_purpose }}</small>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <p><i class="fas fa-map-marker-alt"></i>{{ ' ' . $schedule->place . ', ' . $schedule->date_time->format('d/m/y') }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-center"><strong>-- No Schedule Submitted --</strong></p>
                    @endif
                    </div>
                </div>
        </div>
    </div>
@endsection