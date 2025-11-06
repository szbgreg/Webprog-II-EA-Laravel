@extends("mainpage")
@section("content")

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    Beérkezett <span class="text-primary">üzenetek</span>
                </h1>
                <p class="text-secondary mb-4">
                    Itt láthatod a kapcsolatfelvételi űrlapon beküldött üzeneteket.
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s; max-height: 280px;"
                    src="img/messages.png" alt="Üzenetek listája">
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 pb-5">
    <h1 class="mb-4">Üzenetek listája</h1>

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-hover table-striped table-light align-middle mb-0">
            <thead class="table-light border-bottom border-2 border-grey-dark">
                <tr>
                    <th class="text-primary" style="width: 15%;">Név</th>
                    <th class="text-primary" style="width: 20%;">Email</th>
                    <th class="text-primary" style="width: 45%;">Üzenet szövege</th>
                    <th class="text-primary" style="width: 20%;">Beküldés időpontja</th>
                </tr>
            </thead>
            <tbody>
                @if ($messages->isEmpty())
                <tr>
                    <td class="fw-bold text-muted text-center" colspan="4">Nincsenek üzenetek.</td>
                </tr>
                @else
                @foreach ($messages as $message)
                <tr>
                    <td class="fw-bold text-muted">{{ $message->sender_name }}</td>
                    <td>{{ $message->sender_email }}</td>
                    <td>{{ $message->content }}</td>
                    <td class="fw-bold text-muted">{{ $message->created_at->format('Y.m.d H:i') }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @stop