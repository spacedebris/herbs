@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Stwórz zioło</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('herbs.index') }}">Zwiędnij</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong>Pojawił się problem w formularzu.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'herbs.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tytuł:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Tytuł','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Od</strong>
                {!! Form::date('from', null, array('placeholder' => 'Od','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Do</strong>
                {!! Form::date('to', null, array('placeholder' => 'Do','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Miejsce docelowe</strong>
                {!! Form::text('destination', null, array('placeholder' => 'Lokalizacja','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Finansowanie</strong>
                {!! Form::text('financing', null, array('placeholder' => '','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ads</strong>
                {!! Form::text('advances', null, array('placeholder' => '','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cel podróży:</strong>
                {!! Form::textarea('purpose', null, array('placeholder' => '','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        v>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Rośnij</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection