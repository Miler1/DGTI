<div class="row">
    <div class="col-xs-7 col-sm-7 col-md-7">
        <div class="row">
        <!--<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Disciplina:</strong>
                {!! Form::text('tab_disciplina_id_disciplina', null, array('placeholder' => 'Disciplina','class' => 'form-control')) !!}
            </div>
        </div>-->
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <p></p>
                <p><strong>Descrição:</strong></p>
                {!! Form::text('descricao', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 text-left">
        <p></p>
            <button type="submit" class="btn btn-primary">Enviar</button>
        <p></p>
        </div>
    </div>