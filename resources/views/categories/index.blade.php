@extends('layouts.global')

@section('title') List categories @endsection

@section('content')

<div class="row">
  <div class="col-md-6">
    <form action="{{route('categories.index')}}">

      <div class="input-group">
          <input 
            type="text" 
            class="form-control" 
            placeholder="Filter by category name"
            name="name">
          <div class="input-group-append">
            <input 
              type="submit" 
              value="Filter" 
              class="btn btn-primary">
          </div>
      </div>

    </form>
  </div>
</div>
<hr class="my-3">

<div class="row">
    <div class="col-md-12">
        @if(session('status'))
          <div class="alert alert-success">
              {{session('status')}}
          </div>
        @endif 
        <table class="table table-bordered table-stripped">
        <thead>
            <tr>
            <th><b>Name</b></th>
            <th><b>Slug</b></th>
            <th><b>Image</b></th>
            <th><b>Actions</b></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                @if($category->image)
                    <img 
                     src="{{asset('storage/' . $category->image)}}" 
                     width="48px"/>
                @else 
                    No image
                @endif
                </td>
                <td>
                [TODO: actions]
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colSpan="10">
              {{$categories->appends(Request::all())->links()}}
            </td>
          </tr>
        </tfoot>
        </table>
    </div>
</div>

@endsection