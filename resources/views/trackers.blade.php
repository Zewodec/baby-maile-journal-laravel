@extends('master')

@section('title', 'Трекери')

@section('content')

<h1 class="h1_anastasia text-center">Трекери</h1>

<section class="rozvitok-dytyny-section">

    <div class="rozvitok-dytyny-section__column">
        <h3 class="rozvitok-dytyny-section__column__title">Вагітність</h3>
        <a href="{{route('trackers.vagitnist.index')}}">
            <img src="{{URL::asset('images/rozvitok-dytyny/vagitnist.png')}}" alt="Вагітність"/>
        </a>
    </div>


    <div class="rozvitok-dytyny-section__column">
        <h3 class="rozvitok-dytyny-section__column__title">Немовля</h3>
        <a href="{{route('trackers.nemovlya.index')}}">
            <img src="{{URL::asset('images/rozvitok-dytyny/nemovlya.png')}}" alt="Немовля"/>
        </a>
    </div>

</section>

@endsection
