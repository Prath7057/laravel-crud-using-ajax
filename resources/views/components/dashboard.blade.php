@extends('layouts.App')

@section('title', '| Dashboard')

@section('content')
<div class="container text-center mt-5">
    <h2>Welcome, {{ $username }}!</h2>
    <p class="text-success">You have successfully logged in.</p>
</div>
@endsection
