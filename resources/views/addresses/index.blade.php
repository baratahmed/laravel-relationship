@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Addresses</div>

                <div class="card-body">

                    @foreach ($addresses as $address)
                        <h2>{{ $address->country }}</h2>
                        <h3>{{ $address->user->name }}</h3>
                        {{--  <h3>{{ $address->owner->name }}</h3>  --}}
                        <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
