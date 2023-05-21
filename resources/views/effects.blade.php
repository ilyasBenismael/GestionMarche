@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/effects.css') }}">
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jVectorMap library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css"></script>

<!-- jVectorMap map file for Morocco -->


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
                <p style="color: black;padding: 5px 0;font-weight: 600">Light/Night Mode Switch</p>
                <input type="checkbox" id="codepen"  name="checkbox" class="checkbox switchh">
                <label for="codepen" style="overflow: hidden"></label>
            </div>
        </div>
    </div>


    <div class="mouseEffect1 col-4" id="mouseEffect1">
        <div class="mouseEffectContainer">
            <div class="circleContainer">
                <div class="circle2">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                    <span style="--i:4;"></span>
                    <span style="--i:5;"></span>
                    <span style="--i:6;"></span>
                    <span style="--i:7;"></span>
                    <span style="--i:8;"></span>
                    <span style="--i:9;"></span>
                    <span style="--i:10;"></span>
                    <span style="--i:11;"></span>
                    <span style="--i:12;"></span>
                    <span style="--i:13;"></span>
                    <span style="--i:14;"></span>
                    <span style="--i:15;"></span>
                    <span style="--i:16;"></span>
                    <span style="--i:17;"></span>
                    <span style="--i:18;"></span>
                    <span style="--i:19;"></span>
                    <span style="--i:20;"></span>
                </div>
                <div class="circle2">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                    <span style="--i:4;"></span>
                    <span style="--i:5;"></span>
                    <span style="--i:6;"></span>
                    <span style="--i:7;"></span>
                    <span style="--i:8;"></span>
                    <span style="--i:9;"></span>
                    <span style="--i:10;"></span>
                    <span style="--i:11;"></span>
                    <span style="--i:12;"></span>
                    <span style="--i:13;"></span>
                    <span style="--i:14;"></span>
                    <span style="--i:15;"></span>
                    <span style="--i:16;"></span>
                    <span style="--i:17;"></span>
                    <span style="--i:18;"></span>
                    <span style="--i:19;"></span>
                    <span style="--i:20;"></span>
                </div>
            </div>
            <div class="radioContainer">
                <p style="color: black;padding: 25px 0 0;font-weight: 600;text-align: center">Activate/Desactivate Cursor Animation</p>
                <form action="">
                    <input type="radio" name="rdo" id="yes"  onclick="checkActivation(true)"/>
                    <input type="radio" name="rdo" id="no" checked onclick="checkActivation(false)"/>
                    <div class="switch002">
                        <label for="yes">Yes</label>
                        <span></span>
                        <label for="no">No</label>

                    </div>
                </form>

            </div>
        </div>
    </div>





</div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/effects.js') }}"></script>
@endsection



