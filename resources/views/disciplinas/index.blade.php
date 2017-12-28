    @extends('layouts.default')
    @section('content')
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
        <br>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="jumbotron">
                    <h2>Disciplinas CRUD</h2>
                </div>
                <div class="pull-left">
                    <a data-toggle="modal" data-target="#custom-width-modal3" class="btn btn-success" href="{{ route('disciplinas.create') }}"> Nova Disciplina </a>

                    <div id="custom-width-modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel3" aria-hidden="true" style="display: none;">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                            <div class="modal-dialog modal-lg" style="width: 55%;">
                                <div class="modal-content">
                                    <div class="modal-header">   
                                        <h4 class="modal-title" id="custom-width-modalLabel3">New Record</h4>
                                    </div>
                                    <div class="modal-body">
                                         
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="pull-right">
                    <a data-toggle="modal" data-target="" class="btn btn-primary" href="{{ route('alunos.index') }}"> Voltar</a>
                </div>
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Curso</th>
                    <th>Descrição</th>
                    <th width="280px">Operação</th>
                </tr>
            </thead>
       
            <tbody>
            @foreach($data as $item)
                <tr class="item{{$item->id_disciplina}}">
                    <td id="one">{{$item->id_disciplina}}</td>
                    <td>{{$item->curso}}</td>
                    <td>{{$item->descricao}}</td>
                    <td><!--<button class="edit-modal btn btn-info"
                            data-info="{{$item->id_disciplina}},{{$item->tab_cursos_id_curso}},{{$item->descricao}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#myModal"
                            data-info="{{$item->id_disciplina}},{{$item->tab_cursos_id_curso}},{{$item->descricao}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                        <button class="show-modal btn btn-warning"
                            data-info="{{$item->id_disciplina}},{{$item->tab_cursos_id_curso}},{{$item->descricao}}">
                            <span class="glyphicon glyphicon-search"></span> Show
                        </button>-->
                        <a id="" class="btn btn-primary" data-toggle="modal" data-target="#custom-width-modal2" href="{{ route('disciplinas.show',$item->id_disciplina) }}" data-id="{{ route('disciplinas.show',$item->id_disciplina) }}">Consultar</a>

                        <div id="custom-width-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel2" aria-hidden="true" style="display: none;">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                            <div class="modal-dialog modal-lg" style="width: 55%;">
                                <div class="modal-content">
                                    <div class="modal-header">   
                                        <h4 class="modal-title" id="custom-width-modalLabel2">Show Record</h4>
                                    </div>
                                    <div class="modal-body">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-warning" data-toggle="modal" href="{{ route('disciplinas.edit',$item->id_disciplina) }}" data-id="{{ route('disciplinas.edit',$item->id_disciplina) }}" data-url="" data-target="#custom-width-modal1">Editar</a>

                        <div id="custom-width-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel1" aria-hidden="true" style="display: none;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="modal-dialog modal-lg" style="width: 55%;">
                                <div class="modal-content">
                                    <div class="modal-header">   
                                        <h4 class="modal-title" id="custom-width-modalLabel1">Edit Record</h4>
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-danger" data-toggle="modal" href="{{ route('disciplinas.delete',$item->id_disciplina) }}" data-id="" data-url="" data-target="#custom-width-modal">Deletar</a>
                        
                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel1" aria-hidden="true" style="display: none;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="modal-dialog modal-lg" style="width: 55%;">
                                <div class="modal-content">
                                    <div class="modal-header">   
                                        <h4 class="modal-title" id="custom-width-modalLabel1">Delete Record</h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
    