@extends('layouts.app')

@section('title', $category->name)

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city-profile.jpg') }}');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{ $category->featured_image_url }}"
                                     alt="Imagen representativa de la categoría {{ $category->name }}"
                                     class="img-raised rounded-circle img-fluid">
                            </div>
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="name">
                                <h3 class="title">{{ $category->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ $category->description }}</p>
                </div>

                <div class="text-center gallery">
                    <div class="row">
                        @foreach($category->products as $product)
                            <div class="col-md-4">
                                <div class="card card-plain team-player">
                                    <div class="col-md-6 ml-auto mr-auto">
                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image"
                                             class="img-raised rounded-circle img-fluid"
                                        >
                                    </div>
                                    <h4 class="card-title">
                                        <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
