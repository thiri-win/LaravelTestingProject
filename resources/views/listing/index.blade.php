@extends('layouts.app')
@section('content')

<div class="row">    
    <div class="col-2">
        @include('menu')
    </div>    
    <div class="col-10">
        <div class="row">
            <div class="col-8">
                <form action="{{ route('listing.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Select File for Upload</label>
                        <input type="file" name="select_file">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        @error('select_file')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="col-4" align="right">
                <a href="{{route('listing.export')}}" class="btn btn-success">Export to Excel</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Product</td>
                    <td>Information</td>
                    <td>Stock</td>
                    <td>Price</td>
                    <td>Remark</td>
                    <td>Manufacturing Date</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($listing as $item)
                <tr>                    
                    <td>{{$item->id}}</td>
                    <td>{{$item->product}}</td>
                    <td>{{$item->product_info}}</td>
                    <td>{{$item->in_stock}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->remark}}</td>
                    <td>{{$item->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection