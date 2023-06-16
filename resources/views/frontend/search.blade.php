@extends('layouts.master')
@section('content')

<main id="main" class="site-main overflow">
    
    <section class="restaurant-wrap">
        <div class="container">
            <div class="title_home offset-item">
                <h2 class="title title--more">
                   
                    Você pesquisou por: {{ app('request')->input('category') }}
                    
                    

                    <a title="Ver todas categorias" href="{{URL::to('/todas-categorias')}}">Ver categorias</a>
                </h2>
            </div>
            

            <div class="row">
                
                @forelse ($events as $item)
                <div class="col-sm-3">
                    <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
                        <div class="place-inner">
                            <div class="place-thumb hover-img">
                                <a class="entry-thumb" href="{{URL::to('/detalhes/'.$item->id.'/evento')}}"><img src="/storage/{{$item->image}}" alt=""></a>
                               
                               
                                <a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}" class="author" title="Author"> <img src="/storage/{{$item->user->image}}" alt="Author"></a>
                            </div>
                            <div class="entry-detail">
                                <div class="entry-head">
                                    <div class="place-type list-item">
                                        <span>{{$item->user->company_name}}</span>
                                    </div>
                                    <div class="place-city">
                                        <a href="#">{{$item->city->name}}</a>
                                    </div>
                                </div>
                                
                                <h3 class="place-title"><a href="{{URL::to('/detalhes/'.$item->id.'/evento')}}">{!! Str::limit($item->name, 20) !!}</a></h3>
                                @if (date('Y-m-d H:i') > date('Y-m-d H:i',strtotime("$item->end_date $item->end_time")))
                                        <div class="close-now"><i class="las la-door-closed"></i>Encerado</div>
                                    @else
                                        <div class="open-now"><i class="las la-door-open"></i>A venda</div>
                                    @endif
                                <div class="entry-bottom">
                                        <div class="place-preview">
                                            <div class="place-rating">
                                                <span>{{$item->like->count()}}</span>
                                                <i class="la la-heart"></i>
                                            </div>
                                           
                                        </div>
                                        <div class="place-price">
                                            <span>{{count($item->tickets)}} Bilhetes</span>
                                        </div>
                                    </div>
                                    <div class="entry-bottom">
                                        <div class="place-preview">
                                            <div class="place-rating">
                                                {{-- <span>DOM, 14 MAR - 15:30</span> --}}
                                                <span>{{date('l d M',strtotime($item->start_date))}}</span>
    
                                            </div>
    
                                        </div>
                                        <div class="place-price">
                                            <span>{{$item->tickets->min('price')}}MT</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Nenhum evento</p>
            @endforelse
           

           
              



                
           
                </div>
                   
        
        </div>
    </section>

 
  

</main>
<!-- .site-main -->

@endsection