@extends('layout')

@section('form')
    @if($response['success'])
        <div class="alert alert-success" role="alert">
            {{$response['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{json_encode($response['errors'])}}
        </div>
    @endif
@endsection