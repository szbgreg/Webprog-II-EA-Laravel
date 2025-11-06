@extends("mainpage")
@section("content")

<?php
$mentesMap = [
    'G' => 'Gluténmentes',
    'L' => 'Laktózmentes',
    'HC' => 'Hozzáadott cukor nélkül',
    'Te' => 'Tejmentes',
    'To' => 'Tojásmentes',
    'É' => 'Édesítőszerrel készült'
];
?>

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">Süti</span> adatbázis
                </h1>
                <p class="text-secondary mb-4">
                    Böngéssz a finomabbnál finomabb sütik között!
                    Nézd meg a típusukat, árukat és mentes változataikat is.
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s; max-height: 280px;"
                    src="img/cakesv2.png" alt="Süti lista">
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 pb-5">
    <h1 class="mb-4">Sütik listája</h1>

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-hover table-striped table-light align-middle mb-0">
            <thead class="table-light border-bottom border-2 border-grey-dark">
                <tr> 
                    <th class="text-primary" style="width: 30%;">Név</th>
                    <th class="text-primary" style="width: 15%;">Típus</th>
                    <th class="text-primary text-center pe-5" style="width: 10%;">Díjazott</th>
                    <th class="text-primary" style="width: 20%;">Ár / Egység</th>
                    <th class="text-primary" style="width: 25%;">Mentes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sutik as $suti)
                <tr>
                    <td class="fw-bold">{{ $suti->nev }}</td>
                    <td>{{ $suti->tipus }}</td>
                    <td class="text-center">
                        @if($suti->dijazott)
                        <i class="bi bi-trophy-fill text-warning fs-5 pe-5" title="Díjazott volt a Magyarország Tortája versenyen"></i>
                        @endif
                    </td>
                    <td>
                        @foreach($suti->arak as $ar)
                        <div><span class="fw-bold">{{ $ar->ertek }} Ft </span> - {{ $ar->egyseg }}</div>
                        @endforeach
                    </td>
                    <td>
                        @forelse($suti->tartalmak as $tartalom)
                        @php
                        $label = $mentesMap[$tartalom->mentes] ?? $tartalom->mentes;
                        @endphp
                        <span class="badge bg-info text-dark me-1">{{ $label }}</span>
                        @empty
                        <div>–</div>
                        @endforelse
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