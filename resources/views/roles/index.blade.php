@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Zarządzanie rolami</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('admin')
	            <a class="btn btn-success" href="{{ route('roles.create') }}">Stwórz nową rolę</a>
	            @endpermission
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
			<th>Nr</th>
			<th>Nazwa</th>
			<th>Opis</th>
			<th width="280px">Akcja</th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Pokaż</a>
			@permission('admin')
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edytuj</a>
			@endpermission
			@permission('admin')
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $roles->render() !!}
@endsection