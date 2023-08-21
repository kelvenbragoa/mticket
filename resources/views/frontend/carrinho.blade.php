@extends('layouts.master')
@section('content')

<main id="main " class="site-main ">
    <div class="page-title page-title--small align-left " style="background-image: url({{asset('template2/images/img-bg-blog.png')}}); ">
        <div class="container ">
            <div class="page-title__content ">
                <h1 class="page-title__name ">Carrinho</h1>
            </div>
            
        </div>
    </div>
    <!-- .page-title -->

    <main class="page ">

        
        <section class="shopping-cart ">
    <div class="container">
        <div class="mb-4">
           
            @if (Session::has('messageError'))
                   
            <div class="alert alert-danger" role="alert">
                {{Session::get('messageError')}}
              </div>
        @endif
        @if (Session::has('messageSuccess'))
                       
        <div class="alert alert-primary" role="alert">
            {{Session::get('messageSuccess')}}
          </div>
    @endif
        </div>
        {{-- <div class="row">
            <div class="col-md-3">
                Total: {{$total}} MT <br>
                Total Bilhetes :  {{$cart->sum('qtd')}}
            </div>
           
        </div>
        <div class="row">
            @foreach ($cart as $item)
            <div class="col-md-3 ">
                <img class="img-fluid mx-auto d-block image rounded mb-4" width="100" height="100" src="/storage/{{$item->ticket->event->image}}">
            </div>
            <div class="col-md-8 ">
                <div class="info ">
                    <div class="row ">
                        <div class="col-md-5 product-name ">
                            <div class="product-name ">
                                <a href="# ">{{$item->qtd}}x{{$item->ticket->name}} - {{$item->ticket->price * $item->qtd}} MT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>

        <form action="{{route('meusbilhetes.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-primary btn-lg btn-block " type="submit">Efetuar pagamento</button>
                </div>
            </div>
        </form>
        <br> --}}

        <div class="content ">
            <div class="row ">
                <div class="col-md-12 col-lg-8 ">
                    <div class="items ">
                       
                        @forelse ($cart as $item)
                        <div class="product mb-3 ">
                            <div class="row ">
                                <div class="col-md-3 ">
                                    <img class="img-fluid mx-auto d-block image rounded" src="/storage/{{$item->ticket->event->image}}">
                                </div>
                                <div class="col-md-8 ">
                                    <div class="info ">
                                        <div class="row ">
                                            <div class="col-md-5 product-name ">
                                                <div class="product-name ">
                                                    <a href="# ">{{$item->ticket->event->name}}</a>
                                                    <br>
                                                    <a href="# ">{{$item->ticket->name}}</a>
                                                    <div class="product-info ">
                                                        <div>Quantidade: <span class="value">{{$item->qtd}}</span></div>
                                                        <div>Preço: <span class="value">{{$item->ticket->price}} MT</span></div>
                                                        
                                                        <form id="delete-cart{{$item->id}}" action="{{ route('carrinho.destroy', $item->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            
                                                        </form>
                                                        <a href="" onclick="event.preventDefault(); document.getElementById('delete-cart{{$item->id}}').submit();"> <div style="color:red;"><i class="las la-trash"></i>Apagar Bilhete Do Carrinho</div></a>
                                                        
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                            <div class="col-md-3 price ">
                                                <span>{{$item->ticket->price * $item->qtd}} MT</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        @empty
                        <div class="product text-center">
                            <div class="row ">
                             <p>Não tem nenhum bilhete no carrinho</p>
                             <i class="las la-shopping-cart la-10x"></i>
                             <a href="{{URL::to('/todos-eventos')}}">Ver Eventos</a>
                            </div>
                        </div>
                        @endforelse
                   
                        
                        
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="summary ">
                        <h3>Total: {{$total}} MT</h3>
                        @if ($total != 0)
                            <h3>Comprar</h3>
                        @endif
                        


                       
                        @auth

                            @if ($total != 0)
                            <form action="{{route('meusbilhetes.store')}}" method="POST">
                                @csrf
                                <label for="method">Selecione o seu método de pagamento</label>
                                <select class="form-control" name="method">
                                    <option value="mpesa">Mpesa</option>
                                </select>

                                <label for="mobile">Telefone(ex:84000000):</label>
                                <input class="form-control" name="mobile" maxlength="9" required>
                                <input class="form-control" type="hidden" name="amount" value="{{$total}}" required>
                                <p>Ao clicar em comprar, não saia da página até terminar o processo do pagamento do seu bilhete</p>

                                <button class="btn btn-primary btn-lg btn-block " type="submit">Comprar</button>
                            </form>
                            @endif
                        
                        @else
                            <a class="btn btn-primary btn-lg btn-block " style="background-color: rgb(0, 140, 233)" href="{{route('login')}}">Comprar</a>
                        @endauth
                        
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</section>
      
</main>
</main>
<!-- .site-main -->

@endsection