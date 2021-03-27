@extends('layouts.bs5')

@section('content')
    <div id="app" class="row justify-content-md-center">
        <div class="col-auto mt-3">
            <h2>We are here for you. Please keep your lines open.</h2>
        </div>
        <div class="col-12"></div>
        <div class="col-6">
            <img src="{{ asset('images/received-stamp.png') }}" class="img-fluid">
        </div>
        <div class="col-12"></div>
        <div class="col-auto">
            <a href="https://formofw.com/" class="btn btn-primary">Return to Homepage</a>
        </div>
@endsection

@section('scripts')
@endsection
