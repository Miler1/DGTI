<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Curso::orderBy('id_curso', 'asc')->paginate(10);
        //return view('cursos.index',['cursos' => $cursos]);
        return view('cursos.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cursos.create');
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
        $curso = new Curso;
        $curso->descricao = $request->descricao;
        $curso->save();
        return redirect()->route('cursos.index')->with('message', 'Curso cadastrado com sucesso!');
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
        $curso = Curso::findOrFail($id);
        return view('cursos.show',compact('curso'));
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
        $curso = Curso::findOrFail($id);
        return view('cursos.edit',compact('curso'));
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
        $curso = Curso::findOrFail($id);
        $curso->descricao = $request->descricao;
        $curso->save();
        return redirect()->route('cursos.index')->with('message', 'Curso updated successfully!');
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
            ->first();*/

        $curso = Curso::findOrFail($id);
        return view('cursos.delete')->with('curso', $curso);
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
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->route('cursos.index')->with('alert-success','Curso has been deleted!');
    }
}
