@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>{{ __('You are logged in!') }}</div>
                    
                <div class="col-6">
                    <br>
                    <a type="button" href="{{ url('/motors') }}" class="btn btn-warning">Tampilkan Tabel Motor</button></a>
                    </br>
                    <a type="button" href="{{ url('/motors') }}" class="btn btn-info mt-4">Tampilkan Tabel Motor</button></a>
                    </br>
                    <a type="button" href="{{ url('/motors') }}" class="btn btn-success mt-4">Tampilkan Tabel Motor</button></a>
                    </br>
                    <a type="button" href="{{ url('/motors') }}" class="btn btn-primary mt-4">Tampilkan Tabel Motor</button></a>
                    </br>
                    <img class="gambar" src="images/ikln.jpg" alt="motor">
                </div>
            
            </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
