@extends('layout/layout-common')

@section('space-work')

<div class="login-dark">
    <form action="{{ route('studentRegister') }}" method="POST">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><h2>Register</h2></div>
        <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name"></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <div class="form-group"><input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"></div>
        <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="Register">
            <br>
            <a href="/" class="forgot">Login</a>
        {{-- <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="Login"> --}}
    </form>
    
    @if(Session::has('success'))
    <p style="color:green;">{{ Session::get('success') }}</p>
    @endif
</div>

    {{-- <h1>Register</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
        
    @endif
    
    <form action="{{ route('studentRegister') }}" method="POST">
        @csrf
        
        <input type="text" name="name" placeholder="Enter Name">
        <br><br>
        <input type="email" name="email" placeholder="Enter Email">
        <br><br>
        <input type="password" name="password" placeholder="Enter Password">
        <br><br>
        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password">
        <br><br>
        <input type="submit" value="Register">
        

    </form>

    @if(Session::has('success'))
        <p style="color:green;">{{ Session::get('success') }}</p>
    @endif --}}

@endsection