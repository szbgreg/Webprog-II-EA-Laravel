@extends("mainpage")
@section("content")

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">Sütemény</span> adatai
                </h1>
                <p class="text-secondary mb-4">
                    Itt található a kiválasztott sütemény részletes leírása és adatai.
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite"
                    style="animation-duration: 3s; max-height: 260px;"
                    src="img/crud.png" alt="Sütemény adatai">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm bg-light">
                <div class="card-body p-4">
                    <h3 class="mb-4 text-center text-primary">
                        Sütemény azonosítója: <span class="fw-bold">#{{ $suti->id }}</span>
                    </h3>

                    <table class="table table-borderless mb-0 fs-5">
                        <tr>
                            <th class="text-secondary" style="width: 20%;">Név:</th>
                            <td class="fw-bold">{{ $suti->nev }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Típus:</th>
                            <td class="fw-bold">{{ $suti->tipus }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Díjazott:</th>
                            <td class="fw-bold">
                                @if($suti->dijazott)
                                <span class="text-success">Igen</span>
                                @else
                                <span class="text-danger">Nem</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="mt-4 text-end">
                        <a href="{{ route('sutik.index') }}" class="btn btn-outline-secondary">
                            Vissza a listához
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop