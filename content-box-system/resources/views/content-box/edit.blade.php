@extends('layouts.app')
@section('content')
    @component('components.edit')
        @slot('contentBox', $contentBox)
        @slot('boxFiles', $contentBox->files)
    @endcomponent
@endsection
