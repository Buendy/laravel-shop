@extends('layouts.app')

@section('title', 'Crear Producto')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Editar el producto seleccionado</h2>
                <form action="{{ url('/admin/products/' . $product->id ) }}" method="post" class="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Nombre del Producto</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Precio del Producto</label>
                                <input type="number" step='0.01' class="form-control" name="price" value="{{$product->price}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Descripción corta</label>
                                <input type="text" class="form-control" name="description" value="{{$product->description}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="long_description" cols="130" rows="5"
                                  placeholder="Descripción completa del producto"
                                  class="form-control col-12"
                        >{{$product->long_description}}</textarea>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary" type="submit">Guardar producto</button>
                        <a href="{{url('/admin/products')}}" class="btn btn-default">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
