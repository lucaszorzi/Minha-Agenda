@extends('layouts.app')

@section('content')
    <link href="{{ asset('snippets/fullcalendar-3.4.0/fullcalendar.min.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row justify-content-center">
          <div id='calendar'></div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{ asset('snippets/fullcalendar-3.4.0/lib/moment.min.js') }}" defer></script>
    <script src="{{ asset('snippets/fullcalendar-3.4.0/fullcalendar.min.js') }}" defer></script>

    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                    @foreach($schedules as $schedule)
                    {
                        title : '{{ $schedule->name }}',
                        start : '{{ $schedule->schedule_date }}',
                        url   : '{{ route('schedules.edit', $schedule->id) }}'
                    },
                    @endforeach
                ]
            })
        });
    </script>



@endsection
