@extends('layouts.auth', ['title' => 'Update Password'])

@section('content')

    <div class="container">
        
        {{-- Outer Row --}}
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="img-logo text-center mt-5">
                    <img src="{{  asset('assets/img/company.png') }}" alt="" style="width: 80px;">
                </div>
                <div class="card o-hidden border-0 shadow-lg mb-3 mt-5">
                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div class="text-center">
                            <h1 class="h5 text-gray-900 mb-3">UPDATE PASSWORD</h1>
                        </div>
    
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="font-weight-bold text-uppercase">Email Address</label>
                                <input type="email" name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Alamat Email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-uppercase">Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="password" placeholder="Password Baru">
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-uppercase">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required autocomplete="password_confirmation" placeholder="Password_confirmation Baru">
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">UPDATE PASSWORD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection