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


<div class="container mt-4 pb-5">
    <h1 class="mb-4">Sütik kezelése</h1>
    <div class="d-flex justify-content-end mx-auto w-75 my-2">
        <a href="{{route('sutik.create')}}" class="btn btn-primary d-block"> Új süti hozzáadása</a>
    </div>
    <div class="table-responsive shadow-sm rounded-3 w-75 mx-auto">
        <table class="table table-hover table-striped table-light align-middle mb-0">
            <thead class="table-light border-bottom border-2 border-grey-dark">
                <tr>
                    <th class="text-primary" style="width: 5%;">#</th>
                    <th class="text-primary" style="width: 30%;">Név</th>
                    <th class="text-primary" style="width: 15%;">Típus</th>
                    <th class="text-primary text-center pe-5" style="width: 10%;">Díjazott</th>
                    <th class="text-primary text-center pe-5" style="width: 20%;">Szerkesztés / Törlés</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sutik as $suti)
                <tr>
                    <td class="fw-bold text-muted">{{ $suti->id }}</td>
                    <td class="fw-bold">{{ $suti->nev }}</td>
                    <td>{{ $suti->tipus }}</td>
                    <td class="text-center">
                        @if($suti->dijazott)
                        <span class="text-primary">igen</span>
                        @endif
                    </td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{route('sutik.show', $suti->id)}}"><i class="bi bi-eye text-dark fs-4"></i></a> 
                        <a><i class="bi bi-pencil text-warning fs-4"></i></a>
                        <a><i class="bi bi-trash text-danger fs-4"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $sutik->links() }}
    </div>

</div>

@stop