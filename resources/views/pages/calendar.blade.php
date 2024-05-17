@extends('master')

@section('title', 'Календар')

@section('head')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <script>

        let phpData = @json($calendarData);

        if (phpData == null) {
            phpData = [];
        }

        console.log(phpData);

        function loadInfoDay(dateStr) {
            dateText.innerText = dateStr;
            updateSelectedData();
            mainText.value = phpData[dateStr] ? phpData[dateStr][0]['text'] : '';
            imagesGroup.innerHTML = '';
            if (phpData[dateStr]) {

                phpData[dateStr][0]['images'].forEach((element, index) => {
                    const image = document.createElement('div');
                    image.classList.add('calendar-info__images-group__image-g');
                    image.innerHTML = `
                        <img class="calendar-info__images-group__image" src="storage/${element.path}" alt="image">
                        <div>
                            <a type="button" class="action-button3" href="{{route("calendar.remove_image")}}/${phpData[dateStr][0]['images'][index]['id']}">Видалити</a>
                        </div>
                    `;
                    imagesGroup.appendChild(image);
                });

            }
        }


        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                dateClick: function(info) {
                    // alert('clicked ' + info.dateStr);
                    // phpData[info.dateStr][0]

                    loadInfoDay(info.dateStr);
                },
            });
            calendar.setOption('locale', 'uk');
            calendar.render();
        });

    </script>
@endsection

@section('classes', 'decoration')

@section('content')
    <section class="calendar-section">
        <h1 class="h1_anastasia text-center">Календар</h1>

        <div id='calendar'></div>

        <form class="calendar-info" method="post" action="{{ route('calendar.add_event') }}" enctype="multipart/form-data">
            @csrf
            <h3 id="date_text" class="calendar-info__date">2024-02-15</h3>
            <textarea id="main_text" class="calendar-info__text" name="event_text">Епік подія</textarea>
            <div id="images-group" class="calendar-info__images-group">
                <div class="calendar-info__images-group__image-g">
                    <img class="calendar-info__images-group__image" src="{{asset("images/rozvitok-dytyny/nemovlya/w12-16.png")}}" alt="image">
                    <div>
                    <button type="button" class="action-button3">Видалити</button>
                    </div>
                </div>
                <div class="calendar-info__images-group__image-g">
                    <img class="calendar-info__images-group__image" src="{{asset("images/rozvitok-dytyny/nemovlya/w12-16.png")}}" alt="image">
                    <div class="margin-v-30px">
                        <button type="button" class="action-button3">Видалити</button>
                    </div>
                </div>
            </div>
            <label class="radio-btn-style_label">
                Додати фото
            <input class="input-text" type="file" multiple name="event_images[]">
            </label>
            <input id="selected-date-field" type="hidden" name="selectedDate">
            <button id="save-btn" class="action-button3">Зберегти</button>
        </form>
    </section>
@endsection


@section('scripts')
    <script>
        const dateText = document.getElementById('date_text');
        const mainText = document.getElementById('main_text');
        const saveBtn = document.getElementById('save-btn');
        const imagesGroup = document.getElementById('images-group');
        const selectedDateField = document.getElementById('selected-date-field');

        const date = new Date();

        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // getMonth() returns month from 0 to 11
        const day = String(date.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;

        console.log(formattedDate);
        selectedDateField.value = formattedDate;

        function updateSelectedData(){
            selectedDateField.value = dateText.innerText;
        }

        loadInfoDay(formattedDate);
    </script>
@endsection
