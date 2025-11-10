@extends('mainpage')
@section('content')

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">Felhasználó</span> szerkesztése
                </h1>
                <p class="text-secondary mb-4">
                    Itt módosíthatod a felhasználó jogosultságát.
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite"
                    style="animation-duration: 3s; max-height: 260px;"
                    src="/img/admin.png" alt="Sütemény diagram">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm bg-light">
                <div class="card-body">
                    <h4 class="text-dark mb-4">#{{ $user->id }} – {{ $user->name }} <span class="text-primary">jogosultságának beállítása</span></h4>

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Név</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Szerepkör</label>
                            <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" @if(Auth::user()->name == $user->name) {{ 'disabled' }} @endif>
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Felhasználó</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin') }}" class="btn btn-outline-secondary">
                                Vissza
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Mentés
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection