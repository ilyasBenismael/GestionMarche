@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/effects.css') }}">


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


    <div class="mouseEffect1 col-4" id="mouseEffect1">
        <div class="circleContainer">
            <form>
                <input type="radio" id="option1" name="radioGroup" value="option1" onclick="checkActivation(true)">
                <label for="option1">Option 1</label><br>

                <input type="radio" id="option2" name="radioGroup" value="option2" onclick="checkActivation(false)">
                <label for="option2">Option 2</label><br>

            </form>

        </div>
    </div>





</div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/effects.js') }}"></script>
@endsection



