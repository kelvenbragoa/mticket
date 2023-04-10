@extends('layouts.master')
@section('content')

<main id="main" class="site-main overflow">
    
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2 class="title title--more">Todas Categorias</h2>
                <a title="Ver todos eventos" href="{{URL::to('/todas-eventos')}}">Todos Eventos</a>
            </div>
            

            <div class="row">
                @foreach ($categories as $item)
                <div class="col-sm-3">
                   
                    
                    
                        
                            <a href="{{URL::to('/categoria/'.$item->id.'/eventos')}}" title="{{$item->name}}">
                                <span class="hover-img"> <img src="/storage/{{$item->image}}"  alt="{{$item->name}}" class="rounded-circle"></span>
                               
                            </a>
                            <p class="text-center">{{$item->name}}</p>
                            <br>
                              
                </div>

                @endforeach
              



                
           
                </div>
                   
        
        </div>
    </section>

 
  

</main>
<!-- .site-main -->

@endsection