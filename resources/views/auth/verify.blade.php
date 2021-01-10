@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifiez votre adresse Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de verification a été envoyer dans votre Email') }}
                        </div>
                    @endif

                    {{ __('Avant de proceder, Merci de verifier le lien de verfifcation ') }}
                    {{ __("Si vous n'avez pas reçu l'email de verificaton") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clickez ici pour demander un autre lien') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
