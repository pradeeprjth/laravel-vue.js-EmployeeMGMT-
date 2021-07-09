@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Cities</h1>
</div>
<div class="row">
   <div class="card mx-auto">
      <div>
         @if(session()->has('message'))
         <div class="alert alert-success">
            {{session('message')}}
         </div>
         @endif
      </div>
      <div class="card-header">
         <div class="row">
            <div class="col">
               <form method="GET" action="{{route('city.index')}}">
                  <div class="form-row align-items-center">
                     <div class="col">
                        <input type="search" name="search" class="form-control" placeholder="Search" id="inlineFormInput">
                     </div>
                     <div class="col">
                        <button type="submit" class="btn btn-sm btn-info">Search</button>
                     </div>
                  </div>
               </form>
            </div>
            <a href="{{route('city.create')}}" class="float-right btn btn-outline-success">Create</a>
         </div>
         
      </div>
      <div class="card-body">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">State</th>
                  <th scope="col">Name</th>
                  <th scope="col">Manage</th>
               </tr>
            </thead>
            <tbody>
               @foreach($cities as $city)
               <tr>
                  <th scope="row">{{$city->id}}</th>
                  <th scope="row">{{$city->state->name}}</th>
                  <td>{{$city->name}}</td>
                  <td>
                     <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-warning">Edit</a>
                     <a class="btn btn-sm btn-danger" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-city').submit();">
                        {{ __('Delete') }}
                     </a>

                     <form id="delete-city" action="{{ route('city.destroy',$city->id) }}" method="POST"
                        class="d-none">
                        @csrf
                        @method('DELETE')
                     </form>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection