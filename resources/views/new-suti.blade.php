@extends("mainpage")
@section("content")

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">CRUD</span> alkalmazás
                </h1>
                <p class="text-secondary mb-4">
                    Itt van lehetőség kezelni a sütik tábla adatait
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite"
                    style="animation-duration: 3s; max-height: 260px;"
                    src="/img/crud.png" alt="Sütemény crud">
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success mt-3">
        {{Session::get('success')}}
    </div>
    @endif

    @if(Session::has('failed'))
    <div class="alert alert-danger mt-3">
        {{Session::get('failed')}}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm mt-4 mb-5 bg-light">
        <div class="card-body">
            <h4 class="h3 card-title mb-4 text-primary mx-auto">Süti hozzáadása</h4>

            <form method="post" action="{{ route('sutik.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nev" class="form-label">Süti neve</label>
                    <input type="text" id="nev" name="nev"
                        class="form-control @error('nev') is-invalid @enderror"
                        value="{{ old('nev') }}"
                        placeholder="Add meg a süti nevét">
                    @if ($errors->has('nev'))
                    <div class="invalid-feedback">{{ $errors->first('nev') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="tipus" class="form-label">Típus</label>
                    <input type="text" id="tipus" name="tipus"
                        class="form-control @error('tipus') is-invalid @enderror"
                        value="{{ old('tipus') }}"
                        placeholder="Add meg a süti típusát">
                    @if ($errors->has('tipus'))
                    <div class="invalid-feedback">{{ $errors->first('tipus') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="dijazott" class="form-label">Díjazott</label>
                    <select id="dijazott" name="dijazott"
                        class="form-select">
                        <option value="0" {{ old('dijazott') == '0' ? 'selected' : '' }}>Nem</option>
                        <option value="1" {{ old('dijazott') == '1' ? 'selected' : '' }}>Igen</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-1 ">
                    <div>
                        <a href="{{route('sutik.index')}}" class="btn btn-outline-secondary"> Vissza a sütikhez </a>
                    </div>
                    <button type="submit" class="btn btn-primary px-4">
                        Új süti mentése
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>


@stop