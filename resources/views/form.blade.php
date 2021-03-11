@extends('layout.layout')
@section('content')

    <br>
    <div class="row mt-3">
        <a href="/" class="btn btn-danger">Voltar</a>
    </div>

    @if(isset($register))
        <div class="row text-center">
            <h2>Editar Lembrete</h2>
        </div>
    @else
        <div class="row text-center">
            <h2>Cadastrar Lembrete</h2>
        </div>
    @endif

    @if(isset($register))
        <form action="{{route('lembrete.update', $id)}}" method="post" class="mt-3" enctype="multipart/form-data">
            @else
                <form action="{{route('lembrete.store')}}" method="post" class="mt-3" enctype="multipart/form-data">
                    @endif

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="nome" class="form-control" value="@if(isset($register)) {{$register->nome}} @endif" id="" placeholder="Entregar a tempo projeto" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="@if(isset($register)) {{$register->email}} @endif" class="form-control" id="" placeholder="name@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="">Data</label>
                        <input type="date" name="data" @if(isset($register->data)) value="{{$register->data}}" @endif class="form-control" id="" required>
                    </div>

                    <div class="form-group">
                        <label for="">Hora</label>
                        <input type="time" name="hora" @if(isset($register->hora)) value="{{ $register->hora }}" @endif class="form-control" id="" aria-required="">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Repetição</label>
                        <select class="form-control" id="" name="repeticao">
                            <option>Informe um</option>
                            <option value="Não se repete" @if(isset($register)) @if($register->repeticao == 'Não se repete') selected @endif @endif >Não se repete</option>
                            <option value="Diariamente" @if(isset($register)) @if($register->repeticao == 'Diariamente') selected @endif @endif >Diariamente</option>
                            <option value="cada uma hora" @if(isset($register)) @if($register->repeticao == 'cada uma hora') selected @endif @endif  >cada uma hora</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="" name="status">
                            <option>Informe um status</option>
                            <option value="1" @if(isset($register)) @if($register->status == 1) selected @endif @endif >Ativado</option>
                            <option value="0" @if(isset($register)) @if($register->status == 0) selected @endif @endif >Desativado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        @if(isset($register))
                            <button class="btn btn-warning">Alterar lembrete</button>
                        @else
                            <button class="btn btn-info">Cadastrar lembrete</button>
                        @endif
                    </div>
                </form>
@endsection