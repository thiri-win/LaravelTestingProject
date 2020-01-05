@extends('layouts.app')
@section('content')

<div class="row">    
    <div class="col-2">
        @include('menu')
    </div>    
    <div class="col-10">
        <div class="container">
            {{-- @if (auth()->user()->hasRole(1))   for only one role --}}
            @if (auth()->user()->hasAnyRole([1,2]))
                <div align="right">
                    <a href="{{route('customers.create')}}" class="btn btn-info">Add New Customer</a>
                </div>     
            @endif            
            <br>
            <table class="table">
                <tr>
                    <td>Customer</td>
                    <td>Name</td>
                    <td>Email</td>                    
                    <td>Country</td>                    
                    <td>Actions</td>
                </tr>
                @foreach($customers as $customer)
                <tr>
                    <td>
                        <img src="{{$customer->getCustomerImageUrl()}}" alt="img" class="img-thumbnail">
                    </td>
                    <td>
                        <a href="{{route('customers.show',$customer->id)}}">
                            {{$customer->name}}
                        </a>
                    </td>
                    <td>{{$customer->email}}</td>                    
                    <td>{{$customer->country}}</td>                 
                    <td>
                        <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-info">
                            <i class="fa fa-edit text-white"></i>
                        </a> 
                        <form method="POST" action="{{route('customers.destroy',$customer)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submmit" class="btn btn-danger">
                                <i class="fa fa-trash text-white"></i>
                            </button>                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

<script>
    console.log('hello')
</script>