<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title title-form">{{ $title ?? null }}</h3>
        </div>
        <div class="card-body row">
            @foreach($boxFiles as $file)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('/img/file-default-icon.png') }}">
                        <div class="card-footer">
                            <small class="text-gray">Adicionado em {{ $file->created_at }}</small>
                            <a href="{{ route('download-file', $file->id) }}"><i class="fas fa-download float-right text-primary mt-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-dark float-left"><a href="{{ route('content-box.index') }}" class="text-light">Voltar</a></button>
        </div>
    </div>
</div>
