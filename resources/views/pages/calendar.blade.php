@extends('master')

@section('title', 'Календар')

@section('head')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });

    </script>
@endsection

@section('content')
    <section class="calendar-section">
        <h1 class="h1_anastasia text-center">Календар</h1>

        <div id='calendar'></div>
    </section>
@endsection
