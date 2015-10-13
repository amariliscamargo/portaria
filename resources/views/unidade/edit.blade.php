@extends('app')

@section('content')

<h4>Editar Unidade</h4>

<p>
	<a href="{{ route('admin.condominio.index', [$row->bloco_id])}}">cancelar</a>
</p>

{!! Form::model($row, ['route' => 'admin.condominio.update', $row->id]) !!}

@include('unidade.partial.form')

{!! Form::submit('Gravar', ['class' => 'btn btn-block btn-primary']) !!}
{!! Form::close() !!}

@endsection