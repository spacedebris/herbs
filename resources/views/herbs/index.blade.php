@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Zarządzanie ziołami</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('admin')
	            <a class="btn btn-success" href="{{ route('herbs.create') }}">Stwórz nowe zioło</a>
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
			<th>Zastosowanie</th>
			<th>Notes</th>
			<th width="280px">Akcja</th>
		</tr>
	@foreach ($herbs as $key => $herb)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $herb->name }}</td>
		<td>{{ $herb->descripption }}</td>
		<td>{{ $herb->appliance }}</td>
		<td>{{ $herb->notes }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('herbs.show',$herb->id) }}">Pokaż</a>
			@permission('admin')
			<a class="btn btn-primary" href="{{ route('herbs.edit',$herb->id) }}">Edytuj</a>
			@endpermission
			@permission('admin')
			{!! Form::open(['method' => 'DELETE','route' => ['herbs.destroy', $herb->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $herbs->render() !!}
@endsection