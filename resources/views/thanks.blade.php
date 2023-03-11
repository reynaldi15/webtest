@extends('layout/layout-common')

@section('space-work')
    <div class="container">
        <div class="text-center">
            <h2>Thanks for submit exam, {{ Auth::user()->name }}</h2>
            <p>We Will review your exam , update to your email soon.</p>
            <a href="/dashboard" class="btn btn-info ">Back to Dashboard</a>
        </div>
    </div>
@endsection