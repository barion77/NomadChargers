@extends('layouts.default')

@section('content')
    <main class="section">
        <div class="container">
            <div class="login__wrapper">
                <h2>Регистрация</h2>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form__input @error('name') is-invalid @enderror" placeholder="Введите имя">
                        @error('name')
                            <span class="is-invalid" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form__input @error('email') is-invalid @enderror" placeholder="Введите email">
                        @error('email')
                        <span class="is-invalid" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form__input @error('password') is-invalid @enderror" placeholder="*********">
                        @error('password')
                        <span class="is-invalid" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form__input @error('password_confirmation') is-invalid @enderror" placeholder="*********">
                        @error('password_confirmation')
                        <span class="is-invalid" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Регистрация</button>
                </form>
            </div>
        </div>
    </main>
@endsection
