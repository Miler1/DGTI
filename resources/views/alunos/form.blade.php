    <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Nome:</strong>
                <p>{!! Form::text('nome', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}</p>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>CPF:</strong>
                <p>{!! Form::text('cpf', null, array('placeholder' => 'CPF','class' => 'form-control', 'id' => 'CPF')) !!}</p>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Data Nascimento:</strong>
                <!--{!! Form::text('data_nasc', null, array('placeholder' => 'Data de Nascimento','class' => 'form-control')) !!}-->
                <p>{!! Form::date('data_nasc', null, array('placeholder' => 'Data de Nascimento','class' => 'form-control'), \Carbon\Carbon::now()) !!}</p>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Nome Mãe:</strong>
                <p>{!! Form::text('nome_mae', null, array('placeholder' => 'Nome da Mãe','class' => 'form-control')) !!}</p>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Curso:</strong>
                <!--{!! Form::text('descricao', null, array('placeholder' => 'Curso','class' => 'form-control')) !!}-->
                <p>{!! Form::select('tab_cursos_id_curso',[''=>''],null,['id'=>'tab_cursos_id_curso','class'=>'form-control', 'required']) !!}</p>
            </div>
        </div>
        <!--<div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Disciplina:</strong>
                {!! Form::text('descricao', null, array('placeholder' => 'Curso','class' => 'form-control')) !!}-->
                <!--<p>{!! Form::select('tab_disciplinas_id_disciplina',[''=>''],null,['id'=>'disciplina-button','class'=>'form-control', 'multiple'=>'multiple']) !!}</p>-->
              
            <!--</div>-->
        <!--</div>-->
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Ano/Semestre:</strong>
                <!--{!! Form::text('ano_semestre', null, array('placeholder' => 'Ano e Semestre','class' => 'form-control')) !!}-->
                 <p>{!! Form::select('ano_semestre', ['1/2014' => '01/2014', '2/2014' => '02/2014', '1/2015' => '01/2015', '2/2015' => '02/2015', '1/2016' => '01/2016', '2/2016' => '02/2016', '1/2017' => '01/2017', '2/2017' => '02/2017', '1/2018' => '01/2018', '2/2018' => '02/2018', '1/2019' => '01/2019', '2/2019' => '02/2019', '1/2020' => '01/2020', '2/2020' => '02/2020'], null, ['placeholder' => 'Selecione ano e semestre...', 'class' => 'form-control']) !!}</p>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 text-left">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>