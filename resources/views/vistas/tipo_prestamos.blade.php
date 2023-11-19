@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tipo de prestamos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table-component :name = " 'Tipo de prestamos' " :colums ="" :data="x"></table-component>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
