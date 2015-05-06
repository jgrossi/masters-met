<?php include 'header.php' ?>

<div class="container box box-result">
	<h2>Metadata Extraction Results</h2>
	<p class="lead text-center">
		<?php echo uniqid() ?> <br>
		<span class="text-muted">Masters Collection #1</span>
	</p>
	<table class="table table-bordered table-result table-striped">
		<thead>
			<tr>
				<th width="24%"></th>
				<th width="19%"><a href="individual.php">Cermine</a></th>
				<th width="19%"><a href="individual.php">CiteSeer</a></th>
				<th width="19%"><a href="individual.php">CrossRef</a></th>
				<th width="19%"><a href="individual.php">ParsCit</a></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach(['Title', 'Authores', 'E-mails', 'Abstract', 'References'] as $metadata): ?>
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
	<table class="table table-bordered table-result font-lg">
		<tr class="active">
			<td width="24%" class="metadata">Confiability Index</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
				<span class="label label-success">Accurate</span>
			</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
				<span class="label label-warning">Satisfactory</span>
			</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
				<span class="label label-warning">Satisfactory</span>
			</td>
			<td width="19%">
				<span class="index"><?php echo number_format(rand(9400, 10000)/100, 2) ?></span>
				<span class="label label-danger">Unsatisfying</span>
			</td>
		</tr>
	</table>
</div>

<?php include 'footer.php' ?>