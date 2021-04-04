@extends('layouts.global')

@section('title') Create Category @endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ route('categories.store') }}" class="bg-white shadow-sm p-3">
  @csrf

  <label>Category name</label><br>
    <input 
      type="text" 
      class="form-control" 
      name="name">
    <br>

    <label>Category image</label>
    <input 
      type="file" 
      accept="image/*"
      class="form-control"
      name="image">

    <br>

    <input 
      type="submit" 
      class="btn btn-primary" 
      value="Save">
</form>

@endsection