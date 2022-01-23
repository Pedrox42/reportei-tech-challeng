@extends('layouts.app');

@section('content')
    @component('components.table')
        @slot('title', 'Content Boxes')
            @slot('create', route('content-box.create'))
            @slot('head')
                <th>Título:</th>
                <th>Criada por: </th>
                <th>Ações: </th>
            @endslot
            @slot('body')
                @foreach($contentBoxes as $contentBox)
                    <td>{{ $contentBox->title }}</td>
                    <td>{{ $contentBox->owner->name }}</td>
                    <td>
                        <a href="{{ route('content-box.show', $contentBox->id) }}"><i class="far fa-eye text-primary"></i></a>
                        <a href="{{ route('content-box.edit', $contentBox->id) }}"><i class="fas fa-edit text-warning mx-3"></i></a>
                        <a href="#"><i class="far fa-trash-alt text-danger"></i></a>
                    </td>
                @endforeach
            @endslot
    @endcomponent
@endsection
