@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                   <div class="row mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">CompanyName</th>
                            <th scope="col">CompanyEmail</th>
                            <th scope="col">CompanyLogo</th>
                            <th scope="col">CompanyWebsite</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach($data as $item)
                        <tr>
                       

                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td><img src="{{url('public/Image/'.$item->logo) }}" width= '50' height='50' class="img img-responsive" /></td>
                        
                        <td>{{$item->website}}</td>
                       
                  <td><a class="btn btn-primary" href="{{ route('CompanyEdit',$item->id) }}">Edit</a></td>
                  <td >
                        <form action="{{ route('RemoveCompany',$item->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                       <button class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                      
                       
                       
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
