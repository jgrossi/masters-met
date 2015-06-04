@extends('layout')

@section('content')
<div class="container box box-new-collection">

	<h2>New Collection</h2>

	{!! Form::open(['route' => 'collections.store', 'id' => 'new-collection', 'files' => true]) !!}

		<div class="form-group">
			{!! Form::text('name', null, [
				'placeholder' => 'Collection name', 
				'class' => 'form-control', 
				'id' => 'collection-name'
			]) !!}
		</div>
		
		<div class="form-group group-select-json-file">
			<p>
				<button id="select-json-file" class="btn btn-default btn-outline btn-lg btn-block btn-select-csv">
					Upload JSON file <strong></strong>
				</button>
			</p>
			<div class="alert alert-success text-center display-none">
			    File uploaded successfully!
			</div>
			{{-- <div class="progress isplay-none">
				<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
					
				</div>
			</div> --}}
		</div>
		
		<div class="form-group group-select-papers display-none">
			<p>
				<button id="select-papers" class="btn btn-default btn-lg btn-outline btn-block btn-upload-papers">Upload PDF papers</button>
			</p>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">

				</div>
			</div>
			<div class="alert alert-success text-center display-none">
				Papers successfully uploaded!
			</div>
			<!-- <p class="loading-percent">
				37%
			</p> -->
		</div>
		
		<div class="form-group display-none group-save-collection">
			<hr>
			{{-- Form::submit('Save & Extract', [
				'class' => 'btn btn-primary btn-lg btn-extract-now', 
			]) --}}
			{!! Form::submit('Save Collection', [
				'class' => 'btn btn-primary btn-block btn-lg btn-just-save',
			]) !!}
		</div>
		
		<div class="text-center">
			<a href="extract.php">Go back to collections list</a>
		</div>

	{!! Form::close() !!}
</div>
@endsection
