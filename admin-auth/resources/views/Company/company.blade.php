@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"></div>
        <div class="col-md-6">
        <a class="btn btn-success" href="{{route('CompanyListing')}}">View Companies </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
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
            <form method="POST" name="employee" id="employee" action="{{url('SaveCompany')}}">
            {{ csrf_field() }}
            @method('POST')
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                   <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Name of Company</label>
                      <div class="col-md-6">
                         <input id="companyName" type="text" class="form-control" name="companyName" value="" required="" autocomplete="CompanyName" autofocus=""> 
                         @error('companyName')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Company Email</label>
                      <div class="col-md-6">
                         <input id="companyEmail" type="email" class="form-control " name="companyEmail" value="" required="" autocomplete="CompanyEmail" autofocus=""> 
                         @error('companyEmail')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                         <label for="email" class="col-md-4 col-form-label text-md-end">Companies Logo</label>
                      <div class="col-md-6">
                            <input type="file" id="CompanyLogo" name="CompanyLogo">
                        </div>
                    </div>

                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Website</label>
                      <div class="col-md-6">
                         <input id="companyWebsite" type="text" class="form-control " name="companyWebsite" value="" required="" autocomplete="CompanyWebsite" autofocus=""> 
                         @error('companyWebsite')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                       </div>
                    </div>
                    
                    <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        Create
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
