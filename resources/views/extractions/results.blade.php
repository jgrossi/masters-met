@extends('layout')

@section('content')
<div class="container box box-result">
	<h2>Individual Results for <span class="text-muted">Cermine</span></h2>
	<p class="lead text-center">
		<a href="extraction.php">Extraction #{{ $id }}</a><br>
		<span class="text-muted">Masters Collection Number 1</span>
	</p>
	
	<?php $areas = ['Computer Science', 'Biology', 'Music', 'Information Science', 'Civil Engineer', 'Sociology', 'Psicology', 'Medicine'] ?>
	<?php $area = 0 ?>

	<?php foreach(range(1,80) as $row): ?>
		
	<?php if (($row-1) % 10 == 0): ?>
	
	<p class="lead"><?php echo $areas[$area] ?></p>

	<table class="table table-bordered table-striped table-result table-individual">
		<thead>
			<tr>
				<th width="16.67%">Paper #</th>
				<th width="16.67%">Title</th>
				<th width="16.67%">Authors</th>
				<th width="16.67%">E-mails</th>
				<th width="16.67%">Abstract</th>
				<th width="16.67%">References</th>
			</tr>
		</thead>
		<tbody>

	<?php endif ?>

			<tr>
				<td class="metadata">
					<a href="javascript:void(0)" data-toggle="popover" data-placement="right" title="Keyword Extraction from a Single Document using Word Co-occurrence Statistical Information" data-content="Yutaka Matsuo and Mitsuru Ishizuka and Yutaka Matsuo">+ <?php echo rand(48, 823) ?></a>
				</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			</tr>

	<?php if ($row%10==0): ?>

			<tr class="">
				<td class="metadata">Average</td>
				<td class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
				<td class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			</tr>
		</tbody>
	</table>

	<?php $area++ ?>
	
	<?php endif ?>

	<?php endforeach; ?>

	<hr>
	
	<table class="table table-bordered table-result font-lg">
		<tr class="warning">
			<td width="16.67%" class="metadata">Total Average</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
		</tr>
	</table>
	<hr>
	<nav>
		<ul class="pager">
			<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> CiteSeer</a></li>
			<li class="next"><a href="#">ParsCit <span aria-hidden="true">&rarr;</span></a></li>
		</ul>
	</nav>
</div>
@endsection