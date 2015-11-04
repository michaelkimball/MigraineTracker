@extends('master')

@section('title')

Sign Up Now with MigraineTracker!

@stop

@section('content')

@include('errors.list')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		{!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
		<h1> Create New User </h1>
		<div class='form-group'>
			{!! Form::label('name', 'Username', ['class' => 'sr-only']); !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username'] ); !!}
		</div>
		<div class='form-group'>
			{!! Form::label('email', 'Email Address', ['class' => 'sr-only', 'type' => 'email']) !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address'] ) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password:', ['class' => 'sr-only']) !!}
			{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
		</div>
		<div class='form-group pull-left'>
			{!! Form::submit('Create New Account', ['class' => 'btn btn-default btn-primary']) !!}
		</div>
		<div class='form-group pull-right'>
			{!! link_to_action('Auth\AuthController@getLogin', 'Login to existing account.', array(), ['class' => 'btn btn-default btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>


@stop