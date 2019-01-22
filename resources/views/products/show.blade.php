@extends('layouts.app')


@section('title', $product->name)

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{$product->featured_image_url}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">{{$product->name}}</h3>
                                <h6>{{$product->category->name}}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$product->long_description}}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">

                    </div>
                </div>

                <div class="tab-pane text-center gallery" id="favorite">
                    <div class="row">

                            <div class="col-md-3 ml-auto">
                                @foreach($imagesLeft as $image)
                                <img src="{{ $image->url }}" class="rounded">
                                @endforeach
                            </div>


                            <div class="col-md-3 mr-auto">
                                @foreach($imagesRight as $image)
                                <img src="{{ $image->url }}" class="rounded">
                                @endforeach
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('partials.footer')
@endsection
