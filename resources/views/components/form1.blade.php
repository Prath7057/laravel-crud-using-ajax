@extends('layouts.App')

@section('title', '| Form1')

@section('content')
<div id="main-div" class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4">
        <form id="form1" action="{{ route('submit-form1') }}">
            @csrf
            <div class="card p-4 shadow-lg">
                <h3 class="text-center">Form 1</h3>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
