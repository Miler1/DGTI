<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('tab_disciplinas')
            ->join('tab_cursos', 'tab_disciplinas.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_disciplinas.*', 'tab_cursos.descricao as curso')
            ->orderBy('id_disciplina', 'asc')
            ->get();

        //$disciplinas = Disciplina::orderBy('id_disciplina', 'asc')->paginate(10);
        //return view('disciplinas.index',['disciplinas' => $disciplinas]);
        return view('disciplinas.index')->withData($data);
    }

    public function selectAjax(Request $request)
    {   
        if($request->ajax())
        {
            $states = DB::table('tab_cursos')->pluck('descricao','id_curso');
            $data = view('ajax-select',compact('states'))->render();
            return response()->json(['options'=>$data]);        
        }
    }

    public function selectAjaxEdit(Request $request, $id)
    {   
        if($request->ajax())
        {
            $states = DB::table('tab_cursos')->where('id_curso', $id)->pluck('descricao','id_curso');
            $data = view('ajax-select-edit',compact('states'))->render();
            return response()->json(['options'=>$data]);        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('disciplinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $disciplina = new Disciplina;
        $disciplina->tab_cursos_id_curso = $request->tab_cursos_id_curso;
        $disciplina->descricao           = $request->descricao;
        $disciplina->save();

        return redirect()->route('disciplinas.index')->with('message', 'Disciplina cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$disciplina = Disciplina::findOrFail($id);
        $disciplina = DB::table('tab_disciplinas')
            ->join('tab_cursos', 'tab_disciplinas.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_disciplinas.*', 'tab_cursos.descricao as curso')
            ->where('tab_disciplinas.id_disciplina', '=', $id)
            ->first();

        return view('disciplinas.show',compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        /*$disciplina = DB::table('tab_disciplinas')
            ->join('tab_cursos', 'tab_disciplinas.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_disciplinas.*', 'tab_cursos.descricao as curso')
            ->where('tab_disciplinas.id_disciplina', '=', $id)
            ->first();
        */
        $disciplina = Disciplina::findOrFail($id);
        return view('disciplinas.edit',compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->tab_cursos_id_curso = $request->tab_cursos_id_curso;
        $disciplina->descricao           = $request->descricao;
        $disciplina->save();
        
        return redirect()->route('disciplinas.index')->with('message', 'disciplina updated successfully!');
    }

    public function delete($id)
    {   
        //$aluno = Aluno::with('cursos')->findOrFail($id);
        //$aluno = Curso::findOrFail($id)->aluno; 
        //$aluno = Aluno::findOrFail($id);
        //$items = Curso::all(['id_curso', 'descricao']);
        /*$aluno = DB::table('tab_alunos')
            //->join('tab_cursos', 'tab_alunos.tab_cursos_id_curso', '=', 'tab_cursos.id_curso')
            ->select('tab_alunos.*')
            ->where('tab_alunos.id_aluno', '=', $id)
            ->first();
        */
        $disciplina = Disciplina::findOrFail($id);
        return view('disciplinas.delete')->with('disciplina', $disciplina);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();
        return redirect()->route('disciplinas.index')->with('alert-success','disciplina hasbeen deleted!');
    }
}
