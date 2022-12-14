<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Company;

class AlunoController extends Controller
{
    public function index()
    {
       

        $data['alunos'] = Aluno::orderBy('id')->paginate(5);
        return view('alunos.index', $data);
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required'
            ]);
            $aluno = new Aluno();
            $aluno->nome = $request->nome;
            $aluno->email = $request->email;
            $aluno->telefone = $request->telefone;
            $aluno->save();
            return redirect()->route('alunos.index')
            ->with('Sucesso','Aluno criado com sucesso');
    }

      
    public function show(Aluno $aluno)
    {
        return view('alunos.show',compact('aluno'));
    }

    public function edit(int $id)
    {      
        $aluno = Aluno::find($id);
        return view('alunos.edit',compact('aluno'));
    }

    public function update(Request $request, int $id)
    {   
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            ]);
            $aluno = Aluno::find($id);
            $aluno->nome = $request->nome;
            $aluno->email = $request->email;
            $aluno->telefone = $request->telefone; 
            $aluno->save();

            return redirect()->route('alunos.index')
            ->with('Sucesso','Aluno foi editado com sucesso');
    }



    // public function update(Request $request, $id)
    // {
    // $request->validate([
    // 'name' => 'required',
    // 'email' => 'required',
    // 'address' => 'required',
    // ]);
    // $company = Company::find($id);
    // $company->name = $request->name;
    // $company->email = $request->email;
    // $company->address = $request->address;
    // $company->save();
    // return redirect()->route('companies.index')
    // ->with('success','Company Has Been updated successfully');
    // }



    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')
        ->with('Sucesso','Aluno Deletado com sucesso');
    }
}
