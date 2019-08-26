<div class="calendar-container">
    @for($i = 0; $i < now()->daysInMonth; $i++)
        <p class="calendar-date">{{ $i + 1 }}</p>
    @endfor
</div>