@extends('layouts.app')

@section('content')
    @component('components.table')
        @slot('title', 'Content Boxes')
        @can('create', App\Models\ContentBox::class)
            @slot('create', route('content-box.create'))
        @endcan
        @slot('head')
            <th>Título:</th>
            <th>Criada por: </th>
            <th>Ações: </th>
        @endslot
        @slot('body')
            @foreach($contentBoxes as $contentBox)
                <tr>
                    <td>{{ $contentBox->title }}</td>
                    <td>{{ $contentBox->owner->name }}</td>
                    <td>
                        <div class="row">
                            <a href="{{ route('content-box.show', $contentBox->id) }}"><i class="far fa-eye text-primary"></i></a>
                            @can('update', $contentBox)
                                <a href="{{ route('content-box.edit', $contentBox->id) }}"><i class="fas fa-edit text-warning mx-3"></i></a>
                            @endcan
                            @can('delete', $contentBox)
                                <a href="#" onclick="document.getElementById({{ $contentBox->id }}).submit()"><i class="far fa-trash-alt text-danger"></i></a>
                                <form action="{{ route('content-box.destroy', $contentBox->id) }}" method="post" id="{{ $contentBox->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            @endcan
                            @if($contentBox->favoritedBy->contains(Auth::user()->id))
                                <a href="{{ route('remover-favorito', $contentBox) }}"><i class="fas fa-star mx-3 text-warning"></i></a>
                            @else
                                <a href="{{ route('adicionar-favorito', $contentBox) }}"><i class="far fa-star mx-3 text-warning"></i></a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
