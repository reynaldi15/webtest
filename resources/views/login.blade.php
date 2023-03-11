@extends('layout/layout-common')

@section('space-work')

  <div class="login-dark">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
        
    @endif
    
    @if(Session::has('error'))
    <p style="color:red;">{{ Session::get('error') }}</p>
    @endif
    <form action="{{ route('userLogin') }}" method="POST">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="Login">
        </div><a href="/forget-password" class="forgot">Forgot your email or password?</a>
        <a href="/register" class="forgot"> Your email or password Not ready?</a>
    </form>
</div>

@endsection


 {{-- <h1>Login</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
        
    @endif
    
    @if(Session::has('error'))
    <p style="color:red;">{{ Session::get('error') }}</p>
    @endif
    
    <form action="{{ route('userLogin') }}" method="POST">
        @csrf
        
        <input type="email" name="email" placeholder="Enter Email">
        <br><br>
        <input type="password" name="password" placeholder="Enter Password">
        <br><br>
        <input type="submit" value="Login">
        

    </form>

    <a href="/forget-password">Forget Password</a> --}}