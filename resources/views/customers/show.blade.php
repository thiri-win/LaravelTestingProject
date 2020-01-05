@extends('layouts.app')

@section('content')

@include('customers.readmore')

<div class="row">
    
    <div class="col-2">
        @include('menu')
    </div>
    
    <div class="col-10">
        <div class="row">
            <div class="col-sm-2">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img" src="{{$customer->getCustomerImageUrl()}}" alt="Card image cap">  
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h5 class="card-title">{{$customer->name}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="col-4 text-muted">Email:</label>
                            <span class="col-8">{{ $customer->email }}</span>
                        </div>
                        <div class="col-12">
                            <label class="col-4 text-muted">Address:</label>
                            <span class="col-8">{{ $customer->address }}</span>
                        </div>
                        <div class="col-12">
                            <label class="col-4 text-muted">Country:</label>
                            <span class="col-8">{{$customer->country}}</span>
                        </div>
                        <div class="col-12">
                            <label class="col-4 text-muted">Customer Information:</label>
                            <p class="col-8 d-inline">
                                {{Str::limit($customer->about,50) }}
                                <a href="{{ route('customers.readmore',$customer->id) }}" class="readmore">Read More</a>
                            </p>                        
                        </div>
                        <div class="col-12">
                            <span class="text-muted col-12">Updated at {{ $customer->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.readmore',function(e) {
        e.preventDefault();
        console.log('here');

        $.ajax({
            url: $(this).attr('href'),
            method:"GET",
            success: function(response) {
                $('#ReadMoreModal').modal('show');
            }
        });        
    });
</script>