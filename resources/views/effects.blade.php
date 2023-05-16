@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/effects.css') }}">


@section('content')

<div class="header"><h2>Tous Les Effets Utilisés Sur Le Site Web</h2></div>

<div class="allEffects d-flex">


    <div class="myBox col-4">
        <div class="nightContainer">
            <div class="tumbler-wrapper" >
                <div class="wrapper ">
                    <input disabled type="checkbox" name="checkbox" class="switch001 icon" >
                </div>
            </div>
            <div class="text-container" style="text-align: center">
                <p style="color: black;padding: 5px 0">switch from here</p>
                <input type="checkbox" id="codepen"  name="checkbox" class="checkbox switchh">
                <label for="codepen" style="overflow: hidden"></label>
            </div>
        </div>
    </div>


    <div class="mouseEffect1 col-4">
        <div class="circleContainer">
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
            <div class="circle1"></div>
        </div>
    </div>





</div>
@endsection

    <script src="{{ asset('/js/effects.js') }}"></script>

