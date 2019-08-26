<div class="calendar-container">
    @for($i = 0; $i < now()->daysInMonth; $i++)
        <div class="calendar-date">
            <p>{{ $i + 1 }}</p>
        </div>
    @endfor
</div>