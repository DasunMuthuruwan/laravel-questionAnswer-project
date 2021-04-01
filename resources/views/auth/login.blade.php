@extends('templates.main')
@section('content')
    <div class="card col-md-6 offset-md-3">
        <div class="card-header">
            <h4 class="text-info text-center">Login<h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="form-group" style="display: inline-block;">
                    <button type="submit" class="btn btn-primary float-left">Login Now</button>
                    <a href="{{ route('register') }}" class="ml-4">SignUp</a>
                </div>

            </form>
        </div>
    </div>
@endsection
