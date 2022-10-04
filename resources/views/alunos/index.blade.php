<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Alunos</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Alunos</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('alunos.create') }}"> Criar Aluno</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Alunos</th>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>

</tr>
@foreach ($alunos as $aluno)
<tr>
<td>{{ $aluno->id }}</td>
<td>{{ $aluno->nome }}</td>
<td>{{ $aluno->email }}</td>
<td>{{ $aluno->telefone }}</td>
<td>
<form action="{{ route('alunos.destroy',$aluno->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('alunos.edit',$aluno->id) }}">Editar</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Deletar</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $alunos->links() !!}
</body>
</html>