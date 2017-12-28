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
                    <h2>Alunos CRUD</h2>
                </div>
                <div class="pull-left">
                    <a data-toggle="modal" data-target="#custom-width-modal3" class="btn btn-success" href="{{ route('alunos.create') }}"> Novo Aluno</a>

                    <a data-toggle="modal" data-target="" class="btn btn-info" href="{{ route('cursos.index') }}"> Cursos </a>

                    <a data-toggle="modal" data-target="" class="btn btn-info" href="{{ route('disciplinas.index') }}"> Disciplinas</a>
                    
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
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Semestre</th>
                    <th width="280px">Operação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_aluno }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>{{ $item->ano_semestre }}</td>
                    <td>                 
                        <a id="" class="btn btn-primary" data-toggle="modal" data-target="#custom-width-modal2" href="{{ route('alunos.show',$item->id_aluno) }}" data-id="{{ route('alunos.show',$item->id_aluno) }}">Consultar</a>

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

                        <a class="btn btn-warning" data-toggle="modal" href="{{ route('alunos.edit',$item->id_aluno) }}" data-id="{{ route('alunos.edit',$item->id_aluno) }}" data-url="" data-target="#custom-width-modal1">Editar</a>

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

                        <a class="btn btn-danger" data-toggle="modal" href="{{ route('alunos.delete',$item->id_aluno) }}" data-id="" data-url="" data-target="#custom-width-modal">Deletar</a>
                        
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
                </table>  
        <!--{/*!! $alunos->render()*/ !!}-->
        @endsection
