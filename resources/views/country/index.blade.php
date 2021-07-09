@extends('layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Countries</h1>
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
               <form method="GET" action="{{route('country.index')}}">
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
            <a href="{{route('country.create')}}" class="float-right btn btn-outline-success">Create</a>
         </div>
         
      </div>
      <div class="card-body">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Country Code</th>
                  <th scope="col">Name</th>
                  <th scope="col">Manage</th>
               </tr>
            </thead>
            <tbody>
               @foreach($countries as $country)
               <tr>
                  <th scope="row">{{$country->id}}</th>
                  <th scope="row">{{$country->country_code}}</th>
                  <td>{{$country->name}}</td>
                  <td>
                     <a href="{{route('country.edit',$country->id)}}" class="btn btn-sm btn-warning">Edit</a>
                     <a class="btn btn-sm btn-danger" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-country').submit();">
                        {{ __('Delete') }}
                     </a>

                     <form id="delete-country" action="{{ route('country.destroy',$country->id) }}" method="POST"
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