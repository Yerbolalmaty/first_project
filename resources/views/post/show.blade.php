@extends('layouts.main')
@section('content')
 <div>
         <div>{{$post->id}}.{{$post->title}}</div>
         <div>{{$post->content}}</div>
 </div>
 <div>
     <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning mb-3">Редактировать</a>
 </div>
 <div>
     <form action="{{route('post.delete',$post->id)}}" method="post">
         @csrf
         @method('delete')
         <input type="submit" value="Удалить" class="btn btn-danger mb-3">
     </form>

 </div>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-warning mb-3">Вернуться</a>
    </div>
@endsection
