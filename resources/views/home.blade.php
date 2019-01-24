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
                <div class="text-center">
                    <div>
                        <p>Tu carritode compras tiene {{ auth()->user()->cart->details->count()}} productos</p>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-2 text-center">Name</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Total</th>
                        <th class="text-center">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->cart->details as $detail)
                       <tr>
                           <td class="text-center">
                               <img src="{{$detail->product->featured_image_url}}" height="50">
                           </td>
                           <td>
                               <a href="{{url('/products/' . $detail->product->id)}}" target="_blank">{{$detail->product->name}}</a>
                           </td>
                           <td class="text-center">{{$detail->quantity}}</td>
                           <td class="text-center">{{$detail->quantity * $detail->product->price}}</td>
                           <td class="text-right">{{$detail->product->price}}&euro;</td>
                           <td class="td-actions text-center">
                               <a href="{{url('/products/' . $detail->product->id)}}" target="_blank" rel="tooltip" title="Show product" class="btn btn-info btn-sm">
                                   <i class="fa fa-info"></i>
                               </a>
                               <form action="{{url('/cart')}}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                   <button type="submit" rel="tooltip" title="Delete" class="btn btn-danger btn-sm">
                                       <i class="fa fa-trash"></i>
                                   </button>
                               </form>
                           </td>
                       </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
