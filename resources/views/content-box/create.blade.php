@extends('layouts.app')
@section('content')
    @component('components.create')
        @slot('title', 'Criar Content Box')
        @slot('url', route('content-box.store'))
        @slot('form')
            @include('content-box.form')
        @endslot
    @endcomponent
@endsection
