@extends('layouts.app')

@section('content')
@include("partials.errorsAlert")
<div class="container">

<a href="{{ route('admin.index') }}">Torna alla home</a>
<form action="{{ route('admin.update', $post->id) }}" method="post">
    @csrf

    @method('PATCH')
    <div>
    <label style="width:100px"for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $post->title}}">
    </div>
    <div>
    <label style="width:100px"for="content">Content</label>
    <textarea type="content" name="content" id="content" value="{{ $post->content }}" cols="30" rows="10">{{ $post->content }}</textarea>
    </div>
    <div class="form-group">
                    <label>Categoria</label>
                    <select name="category_id"
                            class="form-control  @error('category_id') is-invalid @enderror" >
                        <option value="">-- seleziona categoria --</option>
                        @foreach ($categories as $category)
                            <option  value="{{ $category->id }}"
                                {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

    <input type="submit" value="Salva">
</form>

</div>
@endsection
