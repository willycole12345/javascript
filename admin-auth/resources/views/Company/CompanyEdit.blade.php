@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <a  class="btn btn-success"href="{{route('CompanyListing')}}">View Companies </a>
        </div>
        <br>
        <br>
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
            <form method="POST" action="{{route('CompanyUpdate',$company->id)}}">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                   <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Name of Company</label>
                      <div class="col-md-6">
                         <input id="companyName" type="text" class="form-control" name="companyName" value="{{$company->name}}" required="" autocomplete="CompanyName" autofocus=""> 
                        
                        </div>
                    </div>
                    <input id="companyid" type="hidden" class="form-control" name="companyid" value="{{$company->id}}" > 
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Company Email</label>
                      <div class="col-md-6">
                         <input id="companyEmail" type="email" class="form-control " name="companyEmail" value="{{$company->email}}" required="" autocomplete="CompanyEmail" autofocus=""> 
                        
                        </div>
                    </div>
                    <div class="row mb-3">
                         <label for="email" class="col-md-4 col-form-label text-md-end">Companies Logo</label>
                      <div class="col-md-6">
                            <input type="file" id="CompanyLogo" name="CompanyLogo">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Logo</label>
                        <div class="col-md-6">
                          <img src="{{url('public/Image/'.$company->logo) }}" class="img-thumbnail" width="100" height="100">
                        </div>
                     </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">Website</label>
                      <div class="col-md-6">
                         <input id="companyWebsite" type="text" class="form-control" name="companyWebsite" value="{{$company->website}}" required="" autocomplete="CompanyWebsite" autofocus=""> 
                        
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
