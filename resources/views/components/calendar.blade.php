<div class="calendar-container">
    <p>Mon</p>
    <p>Tue</p>
    <p>Wed</p>
    <p>Thu</p>
    <p>Fri</p>
    <p>Sat</p>
    <p class="red-date">Sun</p>

    {{-- Variabel firstSpan dari view composer untuk mengetahui awal hari dari tanggal, dengan menambah jumlah grid --}}
    @for($i = 0; $i < $firstDaySpan; $i++)
        <p></p>
    @endfor

    {{-- Objek thisMonth merupakan instance dari Carbon pada view composer dengan set timezone Asia/Jakarta --}}
    @for($i = 1; $i < $thisMonth->daysInMonth + 1; $i++)
        @if($thisMonth->now()->day == ($i))
            @if($scheduleThisMonth->first()->dateSchedule($i))
                @if($scheduleThisMonth->first()->dateSchedule($i)->date_time->day == $i)
                    <a role="button" class="calendar-date event-date-today" data-toggle="popover" title="Schedule Today:" 
                        data-placement="top" data-content="{{ 'Place at ' . $scheduleThisMonth->first()->dateSchedule($i)->place }}">{{ $i }}</a>
                    @endif
            @else
                <a href="#" class="calendar-date selected-date">{{ $i }}</a>
            @endif

        {{-- Mengambil single objek dengan method pada model --}}
        @elseif($scheduleThisMonth->first()->dateSchedule($i))
            @if($scheduleThisMonth->first()->dateSchedule($i)->date_time->day < $thisMonth->now()->day)
                <a href="#" class="calendar-date event-past-date">{{ $i }}</a>
            @else
                <a href="#" class="calendar-date event-date">{{ $i }}</a>
            @endif

        {{-- Menggunakan objek thisMonth untuk mengonversi variabel i menjadi hari untuk mengecek apakah hari minggu --}}
        @elseif($thisMonth->createFromDate(null, null, ($i))->format('l') == 'Sunday')
            <p class="calendar-date red-date">{{ $i }}</p>
        @else
            <p class="calendar-date">{{ $i }}</p>
        @endif
    @endfor
</div>