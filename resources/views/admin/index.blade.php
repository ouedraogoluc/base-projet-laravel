@extends('admin.admin_dashboard')
@section('admin')

<div class="p-4 m-4 py-4 w-100">
    <div class="card-header w-100 bg-light">
        <h4 class="h1 mb-0 text-dark p-4 pl-0">Sessions de Recrutement</h4>
        <p class="h5">Ministère de la Justice, des Droits Humains et de la Protection Sociale</p>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($sessions as $session)
            <div class="col col-md-3 m-4">
                <div class="card btn btn-light h-100 session-card border" data-id="{{ $session->id }}">
                    <div class="card-body d-flex flex-column">
                        <h2 class="text-start">Sessions</h2>
                        <h5 class="card-title text-center">{{ $session->libelle }}</h5>
                    </div>
                    <div class="text-end">
                        <div class="text-success">En cours</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sessionCards = document.querySelectorAll('.session-card');

        sessionCards.forEach(card => {
            card.addEventListener('click', function() {
                const sessionId = this.getAttribute('data-id');
                window.location.href = `/concours/sessions/${sessionId}`;
            });
        });
    });
</script>

@endsection
