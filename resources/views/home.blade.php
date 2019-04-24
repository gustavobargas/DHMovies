@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-12-col-md-6">
            <div class="card mx-auto text-center">
                <div class="card-header">Mensaje</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estas Logeado!
                    <br>
                    <input type ='button' class="btn btn-light text-right" type="submit" value = 'Cerrar' onclick="location.href = '{{  route('index')  }}'"/></button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
