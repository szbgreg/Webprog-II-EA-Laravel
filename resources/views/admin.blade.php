@extends('mainpage')
@section('content')

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">Admin</span> felület
                </h1>
                <p class="text-secondary mb-4">
                    Felhasználók kezelése és jogosultság módosítása
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite"
                    style="animation-duration: 3s; max-height: 260px;"
                    src="img/admin.png" alt="Sütemény diagram">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm bg-light">
        <div class="card-body">
            <h3 class="text-primary mb-4">Felhasználók listája</h3>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>E-mail</th>
                        <th>Típus</th>
                        <th>Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 1)
                                    <span class="badge bg-success">Admin</span>
                                @else
                                    <span class="badge bg-secondary">Felhasználó</span>
                                @endif
                            </td>
                            <td>Módosítás</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
