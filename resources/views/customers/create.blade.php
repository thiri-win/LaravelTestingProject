@extends('layouts.app')
@section('content')

<div class="row">    
    <div class="col-2">
        @include('menu')
    </div>    
    <div class="col-10">
        <form action="{{ route('customers.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="text-muted">Name:</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Email:</label>
                        <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Address:</label>
                        <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Country:</label>                        
                        <select name="country" class="custom-select form-control">
                            @foreach ($country_flags as $country=>$flag)
                                @if(null !== $flag)
                                    <option value="{{ old('country', $country) }}" selected="selected">
                                    {{ $flag }} {{$country}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Customer Information:</label>
                        <textarea class="form-control" name="about" id="about" cols="20" rows="4">{{ old('about') }}</textarea>
                        @error('about')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection