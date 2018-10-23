@extends('layouts.user-master-no-nav')

@section('title', ' Question')

@section('content')
<!-- subscribe now begins -->
<div class="section nav-subscribe">
    <div class="container">
        <div class="nav-subscribe-wrapper">
            <div class="nav-subscribe-left"><p class="subscribe-text"><b class="focus">sol.ng</b><br>Send  a MTN recharge card of 100naira to 08102111311 with your name and school and you will receive your 50 <img src="assets/images/coins2.png" class="coinImage"> coins</p></div>
        </div>
    </div>
</div>
<br>
<center>
    <label for="code">Code:</label><br>
    <input type="text" name="code"/><br><br>
    <button class="btn btn-green btn-bold"><span>Get coin</span></button>
</center>
<!-- subscribe now ends -->

@endsection