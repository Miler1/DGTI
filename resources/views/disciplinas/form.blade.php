<div class="row">
    <div class="col-xs-7 col-sm-7 col-md-7">
        <div class="form-group">
            <strong>Curso:</strong>
            <!--{!! Form::text('tab_cursos_id_curso', null, array('placeholder' => 'Curso','class' => 'form-control')) !!}-->
             <p>{!! Form::select('tab_cursos_id_curso',[''=>''],null,['id'=>'teste','class'=>'form-control']) !!}</p>
        </div>
    </div>
    <br>
    <div class="col-xs-7 col-sm-7 col-md-7">
        <div class="form-group">
            <strong>Descrição:</strong>
            <p>{!! Form::text('descricao', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}</p>
        </div>
    </div>

    <div class="col-xs-7 col-sm-7 col-md-7 text-left">
    <p></p>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <!--<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>-->
    <p></p>
    </div>
</div>
           