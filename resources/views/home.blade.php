@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header text-white" style="background: rgb(255, 132, 0)">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container mt-2">
                        <div class="row">

                          <!-- Módulo 1 -->
                          <div class="col-md-4 mt-2">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Prestamos</h5>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Prestamos</a><br>
                                <a class="link-primary a" href="{{route("tipo_prestamo")}}"> <i class="fa-regular fa-circle-right"></i> Tipo Prestamos</a><br>
                                <a class="link-primary a" href="categoria_prestamos"> <i class="fa-regular fa-circle-right"></i> Categoria Prestamos</a>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mt-2">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Pagos</h5>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Pagos</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Pagos de hoy</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Pagos atrasados</a><br>
                              </div>
                            </div>
                          </div>

                          <!-- Módulo 2 -->
                          <div class="col-md-4 mt-2">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Clientes</h5>
                                <a class="link-primary a" href="{{route('clientes')}}"> <i class="fa-regular fa-circle-right"></i> Clientes</a><br>
                                <a class="link-primary a" href="{{route('avales')}}"> <i class="fa-regular fa-circle-right"></i> Avales</a><br>

                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mt-2">
                            <div class="card">
                              <div class="card-body h-100">
                                <h5 class="card-title">Documentos</h5>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Documentos clientes</a><br>
                                <a class="link-primary a" href="tipo_prestamos"> <i class="fa-regular fa-circle-right"></i> Reportes</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Comprobantes pagos</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Comprobantes Garantías</a><br>
                              </div>
                            </div>
                          </div>

                          <!-- Módulo 3 -->
                          <div class="col-md-4 mt-2">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Garatías</h5>

                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Garantías clientes</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Tipos Garantías</a><br>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mt-2">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Usuarios</h5>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Usuarios</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Permisos</a><br>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mt-2">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Estadisticas</h5>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Prestamos del mes</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Esquema de pagos</a><br>
                                <a class="link-primary a" href="prestamos"> <i class="fa-regular fa-circle-right"></i> Ganancias</a><br>

                              </div>
                            </div>
                          </div>
                          <!-- Puedes agregar más módulos según tus necesidades -->
                          {{-- <table-component></table-component> --}}
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
