@if ($body != '' || !($createFirst ?? true))
    <div class="card">
        @if (isset($create) || isset($titulo))
            <div class="card-header card-outline card-primary">
                <h3 class="float-left m-0 table-title">{{ $title ?? null }}</h3>
                @if (isset($create))
                    <div class="float-right mr-2">
                        <div class="input-group input-group-sm">
                            <a href="{{ $create }}">
                                <button type="button" class="btn btn-primary">
                                    <b><i class="fas fa-plus-circle"></i> Adicionar</b>
                                </button>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="card-body table-responsive ">
            <form id="research">
                <div class="mt-1 col-sm-10 offset-md-9 col-md-3">
                    <input onKeyPress="return research(event)" type="search" class="form-control" id="search" placeholder="Pesquisar" name="search" value="{{request('search')}}">
                </div>
            </form>
            <table  class="table table-hover dataTable table-striped">
                <thead>
                <tr>
                    {{ $head ?? null }}
                </tr>
                </thead>
                <tbody>
                {{ $body ?? null }}
                </tbody>
            </table>
            <div style="margin-top: 40px;"></div>
            {{ $footer ?? null }}
        </div>
    </div>
@else
    <div class="text-center" style="color: #949699">
        <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
        <p class="mb-4 h2">Nenhum item encontrado!</p>
        <a href="{{ $create ?? '#' }}">
            <button type="button" class="btn btn-primary">
                <b><i class="fas fa-plus-circle"></i> Adicionar novo item</b>
            </button>
        </a>
    </div>
@endif

@push('page_scripts')
    <script>
        function research(e){
            if(e && e.keyCode === 13) {
                $("#research").submit();
            }
        }
    </script>
@endpush
