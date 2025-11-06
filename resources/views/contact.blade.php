@extends("mainpage")
@section("content")

<div class="container-fluid hero-header bg-light py-2 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 mb-3 animated slideInDown">
                    <span class="text-primary">Kapcsolatfelvétel</span> – írj nekünk bátran!
                </h1>
                <p class="text-secondary mb-4">
                    Itt tudsz üzenetet küldeni a cukrászda tulajdonosának.
                </p>
            </div>
            <div class="col-lg-6 text-center animated fadeIn">
                <img class="img-fluid animated pulse infinite"
                    style="animation-duration: 3s; max-height: 280px;"
                    src="img/contact.png" alt="Üzenetküldés">
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if(session('success'))
    <div class="alert alert-success mt-3">
        Az üzenet küldése sikeres!
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
            <h4 class="h3 card-title mb-4 text-primary mx-auto">Írj nekünk üzenetet</h4>

            <form method="post" action="{{ url('contact') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Név</label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Add meg a neved">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail cím</label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="Add meg az e-mail címed">
                    @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Üzenet</label>
                    <textarea id="message" name="message"
                        rows="6" class="form-control @error('message') is-invalid @enderror"
                        placeholder="Írd ide az üzeneted...">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                    <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                    @endif
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-send-fill"></i> Küldés
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop