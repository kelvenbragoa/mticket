@extends('layouts_superadmin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Editar cidade</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Editar cidade</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{ route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">Categoria</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Cidade" value="{{$category->name}}" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputCity">Imagem (780 × 520 pixels)</label>
                                <img src="/storage/{{$category->image}}" width="250" height="250" alt="" class="w-100">
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