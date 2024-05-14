@extends('master')

@section('title', 'Трекер поштовхів')



@section('content')
    <h1 class="h1_anastasia text-center">Поштовхи {{date('d-m-Y H:i', strtotime($poshtovhs_date))}}</h1>
    <div class="total-time w100percent" style="justify-content: center;align-content: center;">
        <h5>Тривалість:</h5>
        <h5>{{$poshtovhs_duration}}</h5>
    </div>


    <section class="journal-section">
        <h3 class="journal-section__title">Журнал</h3>
        <table class="journal-section__table">
            <tr>
                <th>Поштовх</th>
                <th>Час</th>
                <th>Інтервал</th>
                <th>Дії</th>
            </tr>
            @for($i = count($poshtovhs[$session_id]) - 1; $i >= 0; $i--)
            <tr>
                <td>{{ $i + 1  }}</td>
                <td>{{ $poshtovhs[$session_id][$i]['time'] }}</td>
                <td>{{ $i > 0 ? (DateTime::createFromFormat('H:i:s', $poshtovhs[$session_id][$i]['time'])->diff(DateTime::createFromFormat('H:i:s', $poshtovhs[$session_id][$i - 1]['time'])))->format('%H:%I:%S') : "" }}</td>
                <td class="journal-section__table__action-column">
                    <a href="{{route('trackers.vagitnist.poshtovhs_details_delete', ['poshtovhs_id'=> $poshtovhs[$session_id][$i]['id'], 'session_id' => $session_id])}}" class="action-button3">Видалити</a>
                </td>
            </tr>
            @endfor

        </table>
    </section>
@endsection
