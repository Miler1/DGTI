    @extends('layouts.default')
    @section('content')
    <br>
        <div class="row">
            <div class="col-lg-7 margin-tb">
               <!-- <div class="pull-left">
                    <h2>Editar Disciplina</h2>
                </div>-->
                <a href="{{ route('alunos.index') }}" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</a>
                <div class="modal-header">   
                    <h2 class="modal-title" id="custom-width-modalLabel2">Informações do Aluno</h2>
                <!--<div class="pull-right">-->             
                    <!--<a class="btn btn-primary" href="{{ route('disciplinas.index') }}"> Voltar</a>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    {{ $aluno->nome }}
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CPF:</strong>
                    {{ $aluno->cpf }}
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data de nascimento:</strong>
                    {{ $aluno->data_nasc }}
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome Mãe:</strong>
                    {{ $aluno->nome_mae }}
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Curso:</strong>
                    {{ $aluno->descricao }}
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ano/Semestre:</strong>
                    {{ $aluno->ano_semestre }}
                    <p></p>
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <table id="table" class="table table-striped" style="width:650px;">
                    <thead>
                        <tr>
                            <th>Disciplinas:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $aluno)
                        <tr>
                            <td>{{ $aluno->disciplina }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <p></p>
                    <p></p>
                </div>
            </div>  
        </div> 
    @endsection