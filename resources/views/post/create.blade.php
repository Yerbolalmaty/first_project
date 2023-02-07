@extends('layouts.main')
@section('content')
 <div>
     <form action="{{route('post.store')}}" method="post">
         @csrf
     <div class="form-group">
         <label for="title" >Title</label>
         <input name="title" class="form-control" id="title" placeholder="title">
     </div>
     <div class="form-group">
         <label for="content" >Content</label>
         <textarea name="content" type="text" class="form-control" id="content" placeholder="Content"></textarea>
     </div>
     <div class="form-group">
         <label for="image" >Image</label>
         <input name="image" type="text" class="form-control" id="image" placeholder="image">
     </div>

     <button type="submit" class="btn btn-primary">Create</button>
     </form>
 </div>
@endsection
