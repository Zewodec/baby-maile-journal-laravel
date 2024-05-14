@extends('master')

@section('title', 'Трекер поштовхів')

@section('head')
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intercept form submission
            $('#form_poshtovh').submit(function (event) {
                // Prevent default form submission
                event.preventDefault();

                // Serialize form data
                var formData = $(this).serialize();

                // Send AJAX request
                $.ajax({
                    url: '{{route('trackers.vagitnist.add_poshtovhs')}}', // URL to submit the form data
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success response
                        console.log('Form submitted successfully');
                        // You can display a success message or perform other actions here
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        console.error('Form submission failed:', error);
                    }
                });
            });
        });
    </script>

@endsection

@section('content')
    <h1 class="h1_anastasia text-center">Лічильник поштовхів</h1>

    <section class="buttons-section">
        <button id="start-button" class="round-lapa-button">Старт</button>
        <form id="form_poshtovh" action="{{route('trackers.vagitnist.add_poshtovhs')}}" method="post">
            @csrf
            <input type="hidden" name="session_id" value="{{uniqid()}}">
            <button id="poshtovh-button" class="round-lapa-button ds-none">Поштовх</button>
        </form>
        <button id="stop-button" class="round-simple-button ds-none">Стоп</button>
    </section>

    <script>
        // Get the buttons
        var startButton = document.getElementById('start-button');
        var poshtovhButton = document.getElementById('poshtovh-button');
        var stopButton = document.getElementById('stop-button');

        // Start button click event
        startButton.addEventListener('click', function () {
            // Show the poshtovh button
            poshtovhButton.classList.remove('ds-none');
            // Hide the start button
            startButton.classList.add('ds-none');
            // Show the stop button
            stopButton.classList.remove('ds-none');
        });

        // Stop button click event
        stopButton.addEventListener('click', function () {
            // Hide the poshtovh button
            poshtovhButton.classList.add('ds-none');
            // Show the start button
            startButton.classList.remove('ds-none');
            // Hide the stop button
            stopButton.classList.add('ds-none');

            //reboot page
            location.reload();
        });
    </script>


    <section class="journal-section">
        <h3 class="journal-section__title">Журнал</h3>
        <table class="journal-section__table">
            <tr>
                <th>Дата і час</th>
                <th>Тривалість</th>
                <th>Поштовхи</th>
                <th>Дії</th>
            </tr>
            @for($i = 0; $i < count($poshtovhs); $i++)
                {{-- dates --}}
                @for($j =0; $j < count($poshtovhs[array_keys($poshtovhs)[$i]]); $j++)
                    {{--sesions--}}
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($poshtovhs[array_keys($poshtovhs)[$i]][$j]['date']))}}</td>
                        <td>{{ $poshtovhs[array_keys($poshtovhs)[$i]][0]['time'] .'-'. $poshtovhs[array_keys($poshtovhs)[$i]][count($poshtovhs[array_keys($poshtovhs)[$i]])-1]['time']  }}</td>
                        <td>{{count($poshtovhs[array_keys($poshtovhs)[$i]])}}</td>
                        <td class="journal-section__table__action-column">
                            <a href="{{route('trackers.vagitnist.poshtovhs_details', ['session_id'=>array_keys($poshtovhs)[$i]])}}" class="selected-child__select-btn"><img
                                        src="{{URL::asset('images/f-arrow-r2.svg')}}"/>
                            </a>
                            <a href="{{route('trackers.vagitnist.delete_poshtovhs', ['session_id'=>array_keys($poshtovhs)[$i]])}}" class="action-button3">Видалити</a>
                        </td>
                    </tr>
                    @php
                        break;
                    @endphp
                @endfor
            @endfor
        </table>
    </section>
@endsection
