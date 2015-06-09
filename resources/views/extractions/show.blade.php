@extends('layout')

@section('content')
<div class="container box box-result">
	<h2>Metadata Extraction Results</h2>
	<p class="lead text-center">
		Extraction #{{ $id }}<br>
		<span class="text-muted">Masters Collection #1</span>
	</p>
	<table class="table table-bordered table-result table-striped">
		<thead>
			<tr>
				<th width="24%"></th>
				@foreach($tools as $tool)
				    <th width="19%">
				        <a href="{{ route('extractions.results', [$id, $tool->slug]) }}">
				            + {{ $tool->name }}
				        </a>
				    </th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		<?php foreach(['Title', 'Authors', 'E-mails', 'Abstract', 'References'] as $metadata): ?>
			<tr>
				<td class="metadata"><?php echo $metadata ?></td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<table class="table table-bordered table-striped table-result font-lg">
		<tr class="">
			<td width="24%" class="metadata">Confiability Index</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
			</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
			</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
			</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
			</td>
		</tr>
		<tr class="">
			<td width="24%" class="metadata">Classification</td>
			<td width="19%">
				<span class="label label-success">Accurate</span>
			</td>
			<td width="19%">
				<span class="label label-info">Satisfactory</span>
			</td>
			<td width="19%">
				<span class="label label-info">Satisfactory</span>
			</td>
			<td width="19%">
				<span class="label label-danger">Unsatisfactory</span>
			</td>
		</tr>
	</table>
</div>
@endsection