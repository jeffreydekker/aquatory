<x-layout>
    @extends('layouts.app')

@section('content')
    <h1>{{ $registration->name }}</h1>
    <p>Email: {{ $registration->email }}</p>
    <p>Other details...</p>
@endsection     
</x-layout>
