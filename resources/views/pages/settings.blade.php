@extends('master')

@section('title', 'Налаштування')

@section('content')
    <h1 class="h1_anastasia text-center">Налаштування</h1>

    <section class="settings-section">
        <div>
            <h3 class="h3_anastasia">Змінити дані вагітності:</h3>
            <form class="border-container" action="{{route('settings.save')}}" method="post">
                @csrf
                <div class="border-container__fields-group">
                    <div class="border-container__fields-group__item">
                        <p class="border-container__fields-group__item__label">Початок останьої менструації:</p>
                        <input id="last_menstruation" type="date" class="input-text w100percent"
                               placeholder="Початок останьої менструації" name="start_last_menstruation" value="{{$settings['start_last_menstruation']}}">
                    </div>
                    <div class="border-container__fields-group__item">
                        <p class="border-container__fields-group__item__label">Дата пологів:</p>
                        <input id="pology_date" type="date" class="input-text w100percent" placeholder="Дата пологів" value="{{$settings['pology_date']}}"
                               name="pology_date">
                    </div>
                    <div class="border-container__fields-group__item">
                        <p class="border-container__fields-group__item__label">Акушерський термін:</p>
                        <input id="akusherskiy_termin" type="date" class="input-text w100percent" value="{{$settings['alusherskiy_termin']}}"
                               placeholder="Акушерський термін" name="alusherskiy_termin">
                    </div>
                    <div class="border-container__fields-group__item">
                        <p class="border-container__fields-group__item__label">Дата зачаття:</p>
                        <input id="data_zachatya" type="date" class="input-text w100percent" placeholder="Дата зачаття" value="{{$settings['data_zachatya']}}"
                               name="data_zachatya">
                    </div>
                </div>

                <script>
                    const last_menstruation = document.getElementById('last_menstruation');
                    const pology_date = document.getElementById('pology_date');
                    const akusherskiy_termin = document.getElementById('akusherskiy_termin');
                    const data_zachatya = document.getElementById('data_zachatya');

                    last_menstruation.addEventListener('change', () => {
                        // minus 3 month and plus one week
                        let pology_date_value = new Date(last_menstruation.value);
                        pology_date_value.setMonth(pology_date_value.getMonth() - 3);
                        pology_date_value.setDate(pology_date_value.getDate() + 7);
                        pology_date.value = pology_date_value.toISOString().split('T')[0];

                        let akusherskiy_termin_value = new Date(last_menstruation.value);
                        akusherskiy_termin_value.setDate(akusherskiy_termin_value.getDate() + 280);
                        akusherskiy_termin.value = akusherskiy_termin_value.toISOString().split('T')[0];

                        let data_zachatya_value = new Date(last_menstruation.value);
                        data_zachatya_value.setDate(data_zachatya_value.getDate() - 14);
                        data_zachatya.value = data_zachatya_value.toISOString().split('T')[0];
                    });

                    pology_date.addEventListener('change', () => {
                        let last_menstruation_value = new Date(pology_date.value);
                        last_menstruation_value.setMonth(last_menstruation_value.getMonth() + 3);
                        last_menstruation_value.setDate(last_menstruation_value.getDate() - 7);
                        last_menstruation.value = last_menstruation_value.toISOString().split('T')[0];

                        let akusherskiy_termin_value = last_menstruation_value;
                        akusherskiy_termin_value.setDate(akusherskiy_termin_value.getDate() + 280);
                        akusherskiy_termin.value = akusherskiy_termin_value.toISOString().split('T')[0];

                        let data_zachatya_value = last_menstruation_value;
                        data_zachatya_value.setDate(data_zachatya_value.getDate() - 14);
                        data_zachatya.value = data_zachatya_value.toISOString().split('T')[0];
                    });

                    akusherskiy_termin.addEventListener('change', () => {
                        let last_menstruation_value = new Date(akusherskiy_termin.value);
                        last_menstruation_value.setDate(last_menstruation_value.getDate() - 280);
                        last_menstruation.value = last_menstruation_value.toISOString().split('T')[0];

                        let pology_date_value = last_menstruation_value;
                        pology_date_value.setMonth(pology_date_value.getMonth() - 3);
                        pology_date_value.setDate(pology_date_value.getDate() + 7);
                        pology_date.value = pology_date_value.toISOString().split('T')[0];

                        let data_zachatya_value = last_menstruation_value;
                        data_zachatya_value.setDate(data_zachatya_value.getDate() - 14);
                        data_zachatya.value = data_zachatya_value.toISOString().split('T')[0];
                    });

                    data_zachatya.addEventListener('change', () => {
                        let last_menstruation_value = new Date(data_zachatya.value);
                        last_menstruation_value.setDate(last_menstruation_value.getDate() + 14);
                        last_menstruation.value = last_menstruation_value.toISOString().split('T')[0];

                        let pology_date_value = last_menstruation_value;
                        pology_date_value.setMonth(pology_date_value.getMonth() - 3);
                        pology_date_value.setDate(pology_date_value.getDate() + 7);
                        pology_date.value = pology_date_value.toISOString().split('T')[0];

                        let akusherskiy_termin_value = last_menstruation_value;
                        akusherskiy_termin_value.setDate(akusherskiy_termin_value.getDate() + 280);
                        akusherskiy_termin.value = akusherskiy_termin_value.toISOString().split('T')[0];
                    });
                </script>

                <div class="text-center">
                    <button class="action-button3">Зберегти дані</button>
                </div>

                <div class="border-container__action-group">
                    <button type="button" class="action-button3">Я народила!</button>
                    <button type="button" class="action-button3">Я більше не вагітна..</button>
                </div>
            </form>
        </div>

        <div class="action-group-vertical">
            <a href="{{route("auth.logout")}}" class="action-button3">Вийти з облікового запису</a>
            <button class="action-button3">Видалити обліковий запис</button>
        </div>

    </section>

@endsection
