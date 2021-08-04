@extends('layouts.app')

@section('content')
    <link href="{{ asset('snippets/fullcalendar-3.4.0/fullcalendar.min.css') }}" rel="stylesheet">

    <div class="container">
        <h1>Agendamento - {{ $user->username }}</h1>
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
                themeSystem: 'bootstrap4',

                header : {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },

                defaultView: 'month',

                buttonText: {
                    today:    'hoje',
                    month:    'mês',
                    week:     'semana',
                    day:      'dia',
                    list:     'lista'
                },

                events : [
                    @foreach($user->events as $event)
                    {
                        id              : '{{ $event->id }}', 
                        title           : '{{ $event->name }}',
                        start           : '{{ $event->date }}' + 'T' + '{{ $event->start_time }}',
                        end             : '{{ $event->date }}' + 'T' + '{{ $event->finish_time }}',
                        description     : '{{ $event->description }}',
                        url             : '{{ route('event_show', [$user->username, $event->id]) }}'
                    },
                    @endforeach
                ],

                eventOrder: 'start',
                

                dayClick: function(date, jsEvent, view) {

                    var url = '{{ route("event_create", [$user->username, "date"=>"data_clicked"]) }}';
                    url = url.replace("data_clicked", date.format());    

                    document.location.href = url;  

                    //window.location = '{{ route('event_create', [$user->username, 'date'=>'2019-11-12']) }}';
                },

                businessHours: {
                  // days of week. an array of zero-based day of week integers (0=Sunday)
                  daysOfWeek: [ 1, 2, 3, 4 ], // Monday - Thursday

                  startTime: '10:00', // a start time (10am in this example)
                  endTime: '18:00', // an end time (6pm in this example)
                }
            });
        });
    </script>
@endsection
