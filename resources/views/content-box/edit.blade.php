@extends('layouts.app')
@section('content')
    @component('components.edit')
        @slot('title', 'Editar Content Box')
        @slot('contentBox', $contentBox)
        @slot('boxFiles', $contentBox->files)
    @endcomponent
@endsection
