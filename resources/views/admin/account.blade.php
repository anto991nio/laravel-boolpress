@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Il Tuo Profilo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="post ">
                        @guest
                        <h4 class="text-secondary">Per poter interagire con i post è necessario loggarti</h4>
                        @endguest
                        @auth
                        <div class="text-center">
                            <h3>Nome : {{Auth::user()->name}}</h3>
                            <h3>Email : {{Auth::user()->email}}</h3>
                            <h3>ID : {{Auth::user()->id}}</h3>
                            <h4>Ecco i tuoi post</h4>
                        </div>
                        <div class="text-right">

                            <button type="button" class="btn btn-primary"><a class="text-light" href="{{route("admin.create")}}">Crea un post</a></button>

                        </div>
                        @endauth

                    </div>
                </div>

            </div>
            
                @foreach($posts as $post)
<div class="container post-container">

                <div class="border row">
                    <div class="col">
                        <h4 class="text-secondary">{{ $post->user->name }}</h4>

                        <div class="text-center">
                            <h5 class="text-primary">{{$post->title}}</h5>
                            <h5 class="text-secondary">{{$post->content}}</h5>
                            <p class="text-left"> Categoria: {{ $post->category ? $post->category->name : 'none' }}</p>
                            TAG: 
                            @foreach($post->tags as $tag)
                            <p class="badge badge-primary">{{ $tag->name }}</p>
                            @endforeach
                        </div>




                    </div>



                </div>
                @auth
                <div class="btn-row row d-flex justify-content-around align-items-center">
                    @if ((Auth::user()->id)==$post->user->id)
                    <div>
                        <button type="button" class="btn btn-secondary"><a class="text-light" href="{{ route('admin.edit', $post->id) }}"><i class="fa fa-pencil-square text-secondary" aria-hidden="true" > Modifica</i></a></button>
                    </div>
                    <div>
                        @include('partials/deleteBtn',["id" => $post->id])
                    </div>

                    @endif

                    <div>
                        <button type="button" class="btn btn-secondary"><a class="text-light" href="{{ route('admin.show', $post->id) }}"><i class="fa fa-info text-secondary" aria-hidden="true"> Dettagli</i></a></button>
                    </div>

                </div>
                @endauth
</div>  
                @endforeach

            
        </div>
    </div>
</div>
@endsection
