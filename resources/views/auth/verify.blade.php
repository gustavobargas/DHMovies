@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificá tu direccion de Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo link de verificacion se ha enviado a tu direccion de email!') }}
                        </div>
                    @endif

                    {{ __('Antes de seguir, por favor chequia en tu correo el link de verificacion de Email.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('clickea aqui para otro problema') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
