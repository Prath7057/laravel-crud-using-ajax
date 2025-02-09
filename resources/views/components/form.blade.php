@extends('layouts.App')

@section('title', '| Form')

@section('content')
<div id="main-div" class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4">
        <form id="form" action="{{ route('submit-form') }}">
            @csrf
            <div class="card p-4 shadow-lg">
                <h3 class="text-center">Form</h3>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
