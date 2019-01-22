@extends('layouts.app')

@section('title', 'Shop Dashboard')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Dashboard</h2>
                @if(session('status'))
                    <div class="alert alert-success" rol="alert"></div>
                    {{ session('status') }}
                @endif
                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i> Carrito de compras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule-1" role="tab" data-toggle="tab">
                            <i class="material-icons">schedule</i> Pedidos realizados
                        </a>
                    </li>

                </ul>
                @foreach(auth()->user()->cart->details as $detail)
                    <ul>
                        <li>{{$detail}}</li>
                    </ul>

                @endforeach
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
