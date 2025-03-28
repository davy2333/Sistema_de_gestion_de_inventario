@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Acceso al Sistema</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('send-magic-link') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Administrador</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Enviar Enlace Mágico
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection