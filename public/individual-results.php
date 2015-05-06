<?php include 'header.php' ?>

<div class="container box box-result">
	<h2>Individual Results for <span class="text-muted">Cermine</span></h2>
	<p class="lead text-center">
		<a href="result.php"><?php echo uniqid() ?></a><br>
		<span class="text-muted">Masters Collection #1</span>
	</p>
	<table class="table table-bordered table-striped table-result table-individual">
		<thead>
			<tr>
				<th width="16.67%">Paper</th>
				<th width="16.67%">Title</th>
				<th width="16.67%">Authores</th>
				<th width="16.67%">E-mails</th>
				<th width="16.67%">Abstract</th>
				<th width="16.67%">References</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach(range(1,100) as $row): ?>
			<tr>
				<td><strong>#<?php echo $row ?></strong></td>
				<td><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
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
			<td width="16.67%" class="metadata">Average</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
			<td width="16.67%" class="metadata"><?php echo number_format(rand(9400, 10000)/100, 2) ?>%</td>
		</tr>
	</table>
	<nav>
		<ul class="pager">
			<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> CiteSeer</a></li>
			<li class="next"><a href="#">ParsCit <span aria-hidden="true">&rarr;</span></a></li>
		</ul>
	</nav>
</div>

<?php include 'footer.php' ?>