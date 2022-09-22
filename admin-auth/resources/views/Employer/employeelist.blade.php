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
                            <th scope="col">firstname</th>
                            <th scope="col">lastName</th>
                            <th scope="col">CompanyName</th>
                            <th scope="col">Email</th>
                            <th scope="col">phoneNumber</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                       @foreach( $data as $item)
                        <tr>
                      

                        <td>{{$item->firstname}}</td>
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phonenumber}}</td>
                    
                           
                  <td><a class="btn btn-primary" href="{{ route( 'employment' , $item->id) }}">Edit</a></td>
                  <td >
                        <form action="{{route('RemoveEmployee', $item->id )}}" method="POST">
                        @csrf
                         @method('DELETE')
                       <button class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection