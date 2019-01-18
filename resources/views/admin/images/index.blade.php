@extends('layouts.app')

@section('title', 'Listado de imágenes')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Imágenes del producto: {{$product->name}}</h2>
                <div class="row justify justify-content-center">
                    <form action="{{url('admin/products/'. $product->id .'/images')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="photo" required>
                        <button type="submit" class="btn btn-primary btn-round">Añadir imagen</button>
                        <a href="{{url('admin/products')}}" class="btn btn-default btn-round">Volver</a>

                    </form>

                </div>
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-4">
                            <div class="card">
                                <img src="{{$image->image}}" alt="Card image cap" class="card-img-top">
                            </div>
                        </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')


@endsection
