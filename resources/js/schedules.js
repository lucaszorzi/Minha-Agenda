$(document).ready(function() {
    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        // put your options and callbacks here
        events : [
            @foreach($schedules as $schedule)
            {
                title : '{{ $schedule->name }}',
                start : '{{ $schedule->schedule_date }}'
            },
            @endforeach
        ]
    });
});
