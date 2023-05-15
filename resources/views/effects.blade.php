@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/effects.css') }}">

@section('content')

    <div class="container">
        <div class="background night">
            <div class="overlay" id="overlay"></div>
            <div class="sun" id="sun"></div>
            <div class="moon" id="moon"></div>
            <div class="stars" id="stars"></div>
            <div class="cloud top" id="cloud-top"></div>
            <div class="cloud mid" id="cloud-mid"></div>
            <div class="cloud bot-backup" id="cloud-bot-backup"></div>
            <div class="forest-top" id="forest-top"></div>
            <div class="forest-bot" id="forest-bot"></div>
        </div>
        <div class="text">
            <h3>Night mode on</h3>
            <p>Toggle switch to change lighting</p>
            <input type="checkbox" class="cbx hidden" id="unchecked">
            <label for="unchecked" class="lbl"></label>
        </div>
    </div>

@endsection

<script src="{{ asset('/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('/js/effects.js') }}"></script>

