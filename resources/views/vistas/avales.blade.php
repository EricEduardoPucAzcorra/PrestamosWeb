@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Avales</li>
                    </ol>
                </nav>
                {{-- <tipo-prestamos :colums ="{{ json_encode($resultado) }}"></tipo-prestamos> --}}
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<style>
    /* Agrega estilos adicionales según sea necesario */
    .breadcrumb {
    background-color: #f8f9fa;
    padding: 8px 15px;
    border-radius: 4px;
    }

    .breadcrumb-item {
    font-size: 14px;
    }

    .breadcrumb-item a {
    text-decoration: none;
    color: #007bff;
    }

    .breadcrumb-item i {
    margin-right: 5px;
    }

    .breadcrumb-item.active {
    color: #6c757d;
    }

</style>
@endpush
