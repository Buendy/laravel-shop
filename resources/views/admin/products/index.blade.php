@extends('layouts.app')


@section('title', 'Listado de Productos')

@section('body-class', 'profile-page sidebar-collapse')


@section('content')

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Let&apos;s talk product</h2>
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                    </div>
                </div>

            </div>
            <div class="section text-center">
                <h2 class="title">Productos disponibles</h2>
                <div class="team">
                    <div class="row">
                        <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-round ">Nuevo producto</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                            </thead>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td>{{$product->name}}</td>
                                <td class="col-4">{{$product->description}}</td>
                                <td>{{ $product->category ? $product->category->name : 'General'}}</td>
                                <td class="text-right">{{$product->price}}&euro;</td>
                                <td class="text-center">
                                    <button type="button" rel="tooltip" title="Ver producto"
                                            class="btn btn-info btn-sm">
                                        <i class="fa fa-info"></i>
                                    </button>
                                    <a href="{{url('/admin/products/' . $product->id . '/edit')}}"
                                       rel="tooltip" title="Editar producto" class="btn btn-info btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" rel="tooltip" title="Eliminar"
                                            class="btn btn-danger btn-simple btn-sm">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>

    

                        @endforeach
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            <div class="section section-contacts">

            </div>
        </div>
    </div>


@endsection
