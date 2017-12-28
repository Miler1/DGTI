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
                    <h2>Cursos CRUD</h2>
                </div>
                <div class="pull-left">
                    <a data-toggle="modal" data-target="#custom-width-modal3" class="btn btn-success" href="{{ route('cursos.create') }}"> Novo Curso</a>

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
                <th>Descrição</th>
                <th width="280px">Operação</th>
            </tr>
            </thead>
        <tbody>
        @foreach ($data as $item)
        <tr class="item{{$item->id_curso}}">
            <td>{{ $item->id_curso }}</td>
            <td>{{ $item->descricao }}</td>
            <td>
                <!--<a class="btn btn-primary" href="{{ route('cursos.show',$item->id_curso) }}">Show</a>
                <a class="btn btn-warning" href="{{ route('cursos.edit',$item->id_curso) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['cursos.destroy', $item->id_curso],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}-->
                <a id="" class="btn btn-primary" data-toggle="modal" data-target="#custom-width-modal2" href="{{ route('cursos.show',$item->id_curso) }}" data-id="{{ route('cursos.show',$item->id_curso) }}">Consultar</a>

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

                <a class="btn btn-warning" data-toggle="modal" href="{{ route('cursos.edit',$item->id_curso) }}" data-id="{{ route('cursos.edit',$item->id_curso) }}" data-url="" data-target="#custom-width-modal1">
                Editar</a>

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

                <a class="btn btn-danger" data-toggle="modal" href="{{ route('cursos.delete',$item->id_curso) }}" data-id="" data-url="" data-target="#custom-width-modal">Deletar</a>
                        
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