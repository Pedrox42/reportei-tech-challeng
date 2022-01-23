<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title title-form">{{ $title ?? null }}</h3>
        </div>
        <div class="card-body row">
            @foreach($contentBox->files as $file)
                <div class="card col-sm-4" style="width: 18rem;">
                    @if(explode('.', $file->name)[1] == 'png' || explode('.', $file->name)[1] == 'gif' || explode('.', $file->name)[1] == 'jpg' || explode('.', $file->name)[1] == 'jpeg' || explode('.', $file->name)[1] == 'svg')
                        <img class="card-img-top" src="{{ asset('/storage/cb-files/'.$file->name) }}" width="200" height="200">
                    @elseif(explode('.', $file->name)[1] == 'pdf')
                        <img class="card-img-top" src="{{ asset('/img/defaults/pdf-default-image.png') }}" width="200" height="200">
                    @elseif(explode('.', $file->name)[1] == 'zip' || explode('.', $file->name)[1] == 'tar' || explode('.', $file->name)[1] == 'gzip' || explode('.', $file->name)[1] == '7z')
                        <img class="card-img-top" src="{{ asset('/img/defaults/compressed-default-image.png') }}" width="200" height="200">
                    @endif
                    <div class="card-footer">
                        <small class="text-gray">Adicionado em {{ $file->created_at }}</small>
                        <a href="{{ route('download-file', $file->id) }}"><i class="fas fa-download float-right text-primary mt-1"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-dark float-left"><a href="{{ route('content-box.index') }}" class="text-light">Voltar</a></button>
            @if($favorited)
                <button type="button" class="btn btn-danger float-right"><a href="{{ route('remover-favorito', $contentBox) }}" class="text-light">Desmarcar como Favorita</a></button>
            @else
                <button type="button" class="btn btn-warning float-right"><a href="{{ route('adicionar-favorito', $contentBox) }}" class="text-light">Marcar como Favorita</a></button>
            @endif
        </div>
    </div>
</div>
