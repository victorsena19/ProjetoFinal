@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="right-panel">
            <div class="row">
                <div class="col-md-12 pt-5">
                    <div id="hits" class="iq-product-layout-grid">
                        <div class="ais-Hits iq-product">
                            <ul class="ais-Hits-list iq-product-list">
                                @foreach($produtos as $produto)
                                <li key="0" class="ais-Hits-item iq-product-item iq-card">
                                    <div class="text-center">
                                        <a href="">
                                            <div class="h-56 d-flex align-items-center justify-content-center bg-white iq-border-radius-15">
                                                <img src="{{url($produto->imagem_path)}}" align="left" alt="">
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <div class="text-justify">
                                                <h5>{{$produto->nome}}</h5>
                                                <p class="font-size-12 mb-0">{{$produto->descricao}} </p>
                                            </div>
                                            <div class="iq-product-action my-2">
                                               <a href="https://web.whatsapp.com/send?phone=5569999924738" target="_blank">
                                                <button type="button" class="btn btn-primary iq-waves-effect text-uppercase btn-sm addToWish" id="5477500"><i class="ri-whatsapp-line mr-0"></i>
                                                </button>
                                               </a>
                                                <p class="font-size-16 font-weight-bold float-right"> {{$produto->valor}} </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="pagination" class="mt-3 mb-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
