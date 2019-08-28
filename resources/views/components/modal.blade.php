<button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#schedule{{ $schedule->id }}">Detail</button>
<div class="modal fade" id="schedule{{ $schedule->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ 'Schedule on : ' . $schedule->date_time->format('l, d F Y') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3" style="font-size: 1rem">
                    <div class="col-md-5">Place </div>
                    <div class="col-md-7">{{ $schedule->place }}</div>
                </div>
                <div class="row mb-3" style="font-size: 1rem">
                    <div class="col-md-5">Time </div>
                    <div class="col-md-7">{{ $schedule->date_time->format('H:i a') }}</div>
                </div>
                <div class="row mb-3" style="font-size: 1rem">
                    <div class="col-md-5">Meeting Purpose </div>
                    <div class="col-md-7">{{ $schedule->meeting_purpose }}</div>
                </div>
                <div class="row mb-3" style="font-size: 1rem">
                    <div class="col-md-5">Note </div>
                    <div class="col-md-7">{{ $schedule->note }}</div>
                </div>
                <div class="row mb-3" style="font-size: 1rem">
                    <div class="col-md-5">Planner </div>
                    <div class="col-md-7">{{ $schedule->user->name }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>