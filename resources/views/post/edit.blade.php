@extends('layouts.main')
@section('content')
 <div>
     <form action="{{route('post.update',$post->id)}}" method="post">
         @csrf
         @method('patch')
     <div class="form-group">
         <label for="title" >Title</label>
         <input name="title" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
     </div>
     <div class="form-group">
         <label for="content" >Content</label>
         <textarea name="content" type="text" class="form-control" id="content" placeholder="Content" >{{$post->content}}</textarea>
     </div>
     <div class="form-group">
         <label for="image" >Image</label>
         <input name="image" type="text" class="form-control" id="image" placeholder="image" value="{{$post->image}}">
     </div>

     <button type="submit" class="btn btn-primary">Редактировать</button>
     </form>
 </div>
@endsection
