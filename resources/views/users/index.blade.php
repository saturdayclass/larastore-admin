@extends('layouts.global')

@section('title') Daftar List Users @endsection

@section('content')

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 

    <form action="{{route('users.index')}}">
      <div class="row">
        <div class="col-md-6">
          <input 
            value="{{Request::get('keyword')}}" 
            name="keyword" 
            class="form-control" 
            type="text" 
            placeholder="Masukan email untuk filter..."/>
        </div>
        <div class="col-md-6">
          <input {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}} 
            value="ACTIVE" 
            name="status" 
            type="radio" 
            class="form-control" 
            id="active">
            <label for="active">Active</label>

          <input {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}} 
            value="INACTIVE" 
            name="status" 
            type="radio" 
            class="form-control" 
            id="inactive">
            <label for="inactive">Inactive</label>

          <input 
            type="submit" 
            value="Filter" 
            class="btn btn-primary">
        </div>
      </div>
    </form>

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
          <th><b>No</b></th>
          <th><b>Name</b></th>
          <th><b>Username</b></th>
          <th><b>Email</b></th>
          <th><b>Avatar</b></th>
          <th><b>Status</b></th>
          <th><b>Action</b></th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach($users as $user)
          <tr>
            <td>{{$no++}}</td>
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
              @if($user->status == "ACTIVE")
              <span class="badge badge-success">
                  {{$user->status}}
              </span>
              @else 
              <span class="badge badge-danger">
                  {{$user->status}}
              </span>
              @endif
            </td>
            <td>
              <a class="btn btn-primary text-white btn-sm" href="{{route('users.edit', [$user->id])}}">Edit</a>
              <form method="post" action="{{route('users.destroy', [$user->id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                @csrf
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
              </form>
              <a class="btn btn-info text-white btn-sm" href="{{route('users.show', [$user->id])}}">Detail</a>
            </td>
          </tr>
        @endforeach 
      </tbody>
      <tfoot>
        <tr>
            <td colspan=5>
                {{$users->appends(Request::all())->links()}}
            </td>
        </tr>
      </tfoot>
    </table>


@endsection