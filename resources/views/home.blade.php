@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
   <br>
   <br>
   <br>
<p style="text-align: right;font-size: 15px;font-weight: bold;margin-right: 314px;">        
        <button class="btn btn-primary" onclick="window.location.href='{{ route('properties.index') }}'">
            Property Details
        </button></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
