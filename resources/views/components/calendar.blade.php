<div class="calendar-container">
    <p>Mon</p>
    <p>Tue</p>
    <p>Wed</p>
    <p>Thu</p>
    <p>Fri</p>
    <p>Sat</p>
    <p class="red-date">Sun</p>

    @for($i = 0; $i < $firstDaySpan; $i++)
        <p></p>
    @endfor

    @for($i = 1; $i <= $thisMonth->daysInMonth; $i++)
        @if($thisMonth->now()->day == ($i))
            <a href="#" class="calendar-date selected-date">{{ $i }}</a>
        @elseif(false)
            @foreach($eventDate as $date)
                @if($date < ($i))
                    <a href="#" class="calendar-date event-past-date">{{ $i }}</a>
                    @break
                @else
                    <a href="#" class="calendar-date event-date">{{ $i }}</a>
                    @break
                @endif
            @endforeach
        @else
            @if($thisMonth->createFromDate(null, null, ($i))->format('l') == 'Sunday')
                <p class="calendar-date red-date">{{ $i }}</p>
            @else
                <p class="calendar-date">{{ $i }}</p>
            @endif
        @endif
    @endfor
    {{ $eventDate }}
</div>