@extends("mainpage")
@section("content")

{{-- Hero szekció --}}
<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">Diagram</span> és statisztikák
                </h1>
                <p class="text-secondary mb-4">
                    Ezen az oldalon összegyűjtöttünk pár érdekes statisztikai adatot.
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite"
                    style="animation-duration: 3s; max-height: 260px;"
                    src="img/chart.png" alt="Sütemény diagram">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-6 text-center">
            <div style="width: 100%; max-width: 500px; margin: 0 auto;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <div class="col-lg-6 card shadow-sm bg-light">
            <div class="card-body">
                <h4 class="h3 mb-4 text-primary">Süteménytípusonkénti eloszlás</h4>
                <h5 class="text-secondary mb-3">Mit mutat a diagram?</h5>
                <p>
                    A kördiagram a cukrászda kínálatában szereplő különféle süteménytípusok eloszlását mutatja,
                    vagyis hogy az egyes típusokhoz hányféle különböző sütemény tartozik.
                    A legnagyobb arányt a <span class="fw-bold text-primary">torták</span> és a <span class="fw-bold text-primary">tortaszeletek</span> képviselik,
                    míg kisebb számban találhatók meg a <em>krémesfélék</em>, <em>bejglik</em> és a különleges tortafélék.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pieChart');
    const labels = @json($labels);
    const values = @json($values);

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Darabszám',
                data: values,
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                    '#9966FF', '#FF9F40', '#C9CBCF', '#7FB77E',
                    '#FFB3C6', '#A2D2FF'
                ],
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 15
                    }
                },
                title: {
                    display: true,
                    position: 'bottom',
                    text: 'Süteménytípusonkénti megoszlás',
                    font: {
                        size: 18
                    }
                }
            }
        }
    });
</script>

@stop