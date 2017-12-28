<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use MercurySeries\Flashy\Flashy;

class AlunoController extends Controller
{
    //
    public function index()
    {

        /*
            $aluno = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_alunos.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_alunos.*', 'tab_cursos.*')
            //->where('tab_alunos.id_aluno', '=', $id)
            ->get();

            return view('alunos.index')->withData($data)->withAluno($aluno);
        */
        $data = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_alunos.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_alunos.*', 'tab_cursos.descricao')
            ->orderBy('id_aluno', 'asc')
            ->get();
        
        return view('alunos.index')->withData($data);
        
    }

    /* Select do curso para o cadastro de aluno */
    public function selectAjax(Request $request)
    {   
        if($request->ajax())
        {
            $states = DB::table('tab_cursos')->pluck('descricao','id_curso');
            $data = view('ajax-select',compact('states'))->render();
            return response()->json(['options'=>$data]);        
        }
    }

    /* Select da disciplina vinculada ao curso para o cadastro de aluno */
    public function selectAjax2(Request $request, $id)
    {   
        if($request->ajax())
        {   
            /*$states = DB::table('tab_cursos')
            ->join('tab_disciplinas', 'tab_cursos.id_curso', '=', 'tab_disciplinas.tab_cursos_id_curso')
            ->select('tab_cursos.*', 'tab_disciplinas.descricao')
            ->where('tab_disciplinas.id_disciplina', $id)
            ->pluck('tab_disciplinas.descricao','tab_disciplinas.tab_cursos_id_curso');*/

            $states = DB::table('tab_disciplinas')->where('tab_cursos_id_curso', $id)->pluck('descricao','id_disciplina');
            $data = view('ajax-select2',compact('states'))->render();
            return response()->json(['options'=>$data]);        
        }
    }

    /* Select do curso para a alteração de aluno */
    public function selectAjaxEdit(Request $request, $id)
    {   
        if($request->ajax())
        {
            $states = DB::table('tab_cursos')->where('id_curso', $id)->pluck('descricao','id_curso');
            $data = view('ajax-select-edit',compact('states'))->render();
            return response()->json(['options'=>$data]);        
        }
    }

    /* Select da disciplina vinculada ao curso para a alteração de aluno */
    public function selectAjaxEdit2(Request $request, $id)
    {   
        if($request->ajax())
        {
            $states = DB::table('tab_disciplinas')->where('tab_cursos_id_curso', $id)->pluck('descricao','id_disciplina');
            $data = view('ajax-select-edit2',compact('states'))->render();
            return response()->json(['options'=>$data]);        
        }
    }
  
    public function create()
    {
        return view('alunos.create');
    }
  
    public function store(Request $request)
    {
        $aluno = new Aluno;
        $aluno->tab_cursos_id_curso           = $request->tab_cursos_id_curso;
        //$aluno->tab_disciplinas_id_disciplina = $request->tab_disciplinas_id_disciplina;
        $aluno->nome                          = $request->nome;
        $aluno->cpf 		                  = $request->cpf;
        $aluno->data_nasc                     = $request->data_nasc;
        $aluno->nome_mae                      = $request->nome_mae;
        $aluno->ano_semestre                  = $request->ano_semestre;
        $aluno->save();

        /*Buscar os dados para a tabela de ligação*/
        $data = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_cursos.id_curso','=','tab_alunos.tab_cursos_id_curso')
            ->join('tab_disciplinas', 'tab_cursos.id_curso', '=', 'tab_disciplinas.tab_cursos_id_curso')
            ->select('tab_disciplinas.id_disciplina')
            ->where('tab_alunos.id_aluno','=',$aluno->id_aluno)
            ->orderBy('id_aluno', 'asc')
            ->get();

        /*Inserindo os dados na tabela de ligação*/
        foreach ($data as $item)
        {
            DB::table('alunos_disciplinas')->insert(
            ['tab_disciplinas_id_disciplina' => $item->id_disciplina, 'tab_alunos_id_aluno' => $aluno->id_aluno]);
        }

        return redirect()->route('alunos.index')->with('message', 'Aluno cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        //
        //$aluno = Aluno::findOrFail($id);
        $aluno = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_alunos.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_alunos.*', 'tab_cursos.descricao')
            ->where('tab_alunos.id_aluno', '=', $id)
            ->first();

        $data = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_cursos.id_curso','=','tab_alunos.tab_cursos_id_curso')
            ->join('tab_disciplinas', 'tab_cursos.id_curso', '=', 'tab_disciplinas.tab_cursos_id_curso')
            ->select('tab_alunos.*', 'tab_cursos.descricao','tab_disciplinas.descricao as disciplina')
            ->where('tab_alunos.id_aluno','=',$id)
            ->orderBy('id_aluno', 'asc')
            ->get();

        return view('alunos.show')->withData($data)->withAluno($aluno);
        
    }
  
    public function edit($id)
    {   
        //$aluno = Aluno::with('cursos')->findOrFail($id);
        //$aluno = Curso::findOrFail($id)->aluno; 
        //$aluno = Aluno::findOrFail($id);
        //$items = Curso::all(['id_curso', 'descricao']);
        $aluno = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_alunos.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_alunos.*', 'tab_cursos.descricao')
            ->where('tab_alunos.id_aluno', '=', $id)
            ->first();
        
        return view('alunos.edit')->with('aluno', $aluno);
    }
  
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->tab_cursos_id_curso = $request->tab_cursos_id_curso;
        //$aluno->tab_disciplinas_id_disciplina = $request->tab_disciplinas_id_disciplina;
        //$quant = count($request->tab_disciplinas_id_disciplina);
        $aluno->nome                = $request->nome;
        $aluno->cpf                 = $request->cpf;
        $aluno->data_nasc           = $request->data_nasc;
        $aluno->nome_mae            = $request->nome_mae;
        $aluno->ano_semestre        = $request->ano_semestre;
        $aluno->save();

        /* Quando o curso for alterado as disciplinas devem ser deletadas e inseridas novas disciplinas relacionadas ao  novo curso selecionado */
        DB::table('alunos_disciplinas')->where('alunos_disciplinas.tab_alunos_id_aluno', '=', $aluno->id_aluno)->delete();

        /*Buscar os dados para a tabela de ligação*/
        $data = DB::table('tab_alunos')
            ->join('tab_cursos', 'tab_cursos.id_curso','=','tab_alunos.tab_cursos_id_curso')
            ->join('tab_disciplinas', 'tab_cursos.id_curso', '=', 'tab_disciplinas.tab_cursos_id_curso')
            ->select('tab_disciplinas.id_disciplina')
            ->where('tab_alunos.id_aluno','=',$aluno->id_aluno)
            ->orderBy('id_aluno', 'asc')
            ->get();

        /* Após o delete insere os novos dados */
        foreach ($data as $item)
        {
            DB::table('alunos_disciplinas')->insert(
            ['tab_disciplinas_id_disciplina' => $item->id_disciplina, 'tab_alunos_id_aluno' => $aluno->id_aluno]);
        }

        return redirect()->route('alunos.index')->with('message', 'Aluno atualizado com successo!');
    }

    public function delete($id)
    {   
        //$aluno = Aluno::with('cursos')->findOrFail($id);
        //$aluno = Curso::findOrFail($id)->aluno; 
        //$aluno = Aluno::findOrFail($id);
        //$items = Curso::all(['id_curso', 'descricao']);
        $aluno = DB::table('tab_alunos')
            //->join('tab_cursos', 'tab_alunos.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_alunos.*')
            ->where('tab_alunos.id_aluno', '=', $id)
            ->first();
        
        return view('alunos.delete')->with('aluno', $aluno);
    }
  
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return redirect()->route('alunos.index')->with('alert-success','Aluno foi deletado!');
    }
}
