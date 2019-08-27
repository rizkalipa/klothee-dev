<div class="calendar-container">
    <p>Mon</p>
    <p>Tue</p>
    <p>Wed</p>
    <p>Thu</p>
    <p>Fri</p>
    <p>Sat</p>
    <p>Sun</p>

    @for($i = 0; $i < $firstDaySpan; $i++)
        <p ></p>
    @endfor

    @for($i = 0; $i < $thisMonth->daysInMonth; $i++)
        <p class="{{ $thisMonth->now()->day == ($i + 1) ? 'selected-date' : 'calendar-date' }}">{{ $i + 1 }}</p>
    @endfor
</div>