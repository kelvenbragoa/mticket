@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Categoria</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Categoria </h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Categoria</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Categoria" value="{{ old('name') }}" required>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputCity">Imagem (780 × 520 pixels)</label>
                                <input type="file" class="form-control" placeholder="Image" name="image" value="{{ old('image') }}" required> 
                            </div>  
                        </div>
                     
        
                        <button type="submit" class="btn btn-primary">Submeter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection