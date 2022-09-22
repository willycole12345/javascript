
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <a class="btn btn-success" href="{{route('ListingEmployee')}}"> List Employees</a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{url('SaveEmployee')}}">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header"></div>
                @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                <div class="card-body">
                   <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Firstname</label>
                      <div class="col-md-6">
                         <input id="firstName" type="text" class="form-control " name="firstName" value="{{$employees->firstname}}" required="" autocomplete="firstName" autofocus=""> 
                         @error('firstName')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Lastname</label>
                      <div class="col-md-6">
                         <input id="lastName" type="text" class="form-control" name="lastName" value="{{ $employees->lastname }}" required="" autocomplete="lastName" autofocus=""> 
                         @error('lastName')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Companies</label>
                      <div class="col-md-6">
                      <select class="form-control form-control-sm" id="CompanyName" name="CompanyName">
                      <option value="">Small select</option>
                      @foreach ($data as $item) 
                      {{ $employees->Company == $item->id ? 'selected' : '' }}
                                <!-- <option value="{{$item->id}}">{{$item->name}}</option> -->
                                <option value=" {{ $employees->Company == $item->id ? 'selected' : '' }}">{{$item->name}}</option>
                                @endforeach      
                    
                                </select>
                                @error('CompanyName')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                      <div class="col-md-6">
                         <input id="Employemail" type="email" class="form-control " name="Employemail" value="{{ $employees->email }}" required="" autocomplete="email" autofocus=""> 
                         @error('Employemail')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Phone Number</label>
                      <div class="col-md-6">
                         <input id="phoneNumber" type="text" class="form-control " name="phoneNumber" value="{{$employees->phonenumber}}" required="" autocomplete="phonenumber" autofocus=""> 
                         @error('phoneNumber')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       </div>
                    </div>
                    <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        update
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection