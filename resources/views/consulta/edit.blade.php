@extends('layouts.app')
@section('content-title', 'Consulta - atendimento')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Consulta</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="{{ route('consulta.store') }}" method="post" class="form-horizontal">
                                @csrf

                                <input type="hidden" name="id" id="id" value="{{$consulta->id}}">
                                <input type="hidden" name="data" value="{{$consulta->data}}">

                                <div class="form-group">
                                    <label for="nome" class="col-sm-3 control-label">Paciente</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b" id="paciente_id" name="paciente_id" required>
                                            <option></option>
                                            @foreach($pacientes as $p)
                                                @php
                                                    $checked = ($p->id == $consulta->paciente->id ) ? 'selected="true"' : '';
                                                @endphp
                                                <option {{ $checked  }} value="{{ $p->id }}">{{$p->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nome" class="col-sm-3 control-label">Terapeuta</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b" id="aluno_id" name="aluno_id" required>
                                            <option></option>
                                            @foreach($alunos as $a)
                                                @php
                                                    $checked = ($a->id == $consulta->aluno->id) ? 'selected="true"' : '';
                                                @endphp
                                                <option {{ $checked  }} value="{{ $a->id }}">{{$a->tx_nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nome" class="col-sm-3 control-label">Supervisor</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-b" id="supervisor_id" name="supervisor_id" required>
                                            <option></option>
                                            @foreach($supervisores as $s)
                                                @php
                                                    $checked = ($s->id == $consulta->supervisor_id ) ? 'selected="true"' : '';
                                                @endphp
                                                <option {{ $checked  }} value="{{ $s->id }}">{{$s->tx_nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="relato" class="col-sm-3 control-label">Relato</label>
                                    <div class="col-sm-9">
                                        <textarea name="relato" id="relato" rows="10" class="form-control" style="resize: none" required>{{$consulta->relato}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit" id="btn-salvar" onclick="return validaRelatoConsulta();"><span class="fa fa-check"></span> Salvar</button>
                                        <a href="/consulta" class="btn btn-danger"><span class="fa fa-hand-o-left"></span> Voltar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function validaRelatoConsulta() {
            var relato = $('#relato').val();
            if (relato.length === 0 || !relato.trim()) {
                swal("Oops!", "Preencha devidamente os campos da consulta!", "error");
                return false;
            }
            return true;
        }
    </script>
@endsection
