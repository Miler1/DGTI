    @extends('layouts.default')
    @section('content')
    <br>
        <div class="row">
            <div class="col-lg-7 margin-tb">
               <!-- <div class="pull-left">
                    <h2>Editar Disciplina</h2>
                </div>-->
                <a href="{{ route('cursos.index') }}" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</a>
                <div class="modal-header">   
                    <h2 class="modal-title" id="custom-width-modalLabel3">Novo Curso</h2>
                <!--<div class="pull-right">-->             
                    <!--<a class="btn btn-primary" href="{{ route('disciplinas.index') }}"> Voltar</a>-->
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(array('route' => 'cursos.store','method'=>'POST')) !!}
             <p>@include('cursos.form')</p>
        {!! Form::close() !!}
    @endsection