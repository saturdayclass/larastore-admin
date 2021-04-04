@extends('layouts.global')

@section('title') Daftar List Users @endsection

@section('content')

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 

    <div class="row">
      <div class="col-md-6">
      <form action="{{route('users.index')}}">
          <div class="input-group mb-3">
          <input
            value="{{Request::get('keyword')}}" 
            name="keyword" 
            class="form-control col-md-10" 
            type="text"
            placeholder="Filter berdasarkan email"/>

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

    <div class="row">
        <div class="col-md-12 text-right">
            <a 
              href="{{route('users.create')}}" 
              class="btn btn-primary">Create user</a>
        </div>
    </div>
    <br>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th><b>Name</b></th>
          <th><b>Username</b></th>
          <th><b>Email</b></th>
          <th><b>Avatar</b></th>
          <th><b>Action</b></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>
              @if($user->avatar)
                <img src="{{asset('storage/'.$user->avatar)}}" width="70px"/> 
              @else 
                N/A
              @endif

            </td>
            <td>
              <a class="btn btn-primary text-white btn-sm" href="{{route('users.edit', [$user->id])}}">Edit</a>
              <form method="post" action="{{route('users.destroy', [$user->id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                @csrf
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="submit" value="DELETE" class="btn btn-danger btn-sm">
              </form>
              <a class="btn btn-info text-white btn-sm" href="{{route('users.show', [$user->id])}}">Detail</a>
            </td>
          </tr>
        @endforeach 
      </tbody>
    </table>


@endsection