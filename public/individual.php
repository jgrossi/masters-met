<?php include 'header.php' ?>

<div class="container box box-result">
	<h2>Individual Results for <span class="text-muted">Cermine</span></h2>
	<p class="lead text-center">
		<a href="extraction.php"><?php echo uniqid() ?></a><br>
		<span class="text-muted">Masters Collection #1</span>
	</p>
	
	<?php $areas = ['Computer Science', 'Biological', 'Music', 'Information Science', 'Civil Engineer', 'Sociology', 'Psicology', 'Another Area Name', 'Something Engineer', 'Medicine'] ?>
	<?php $area = 0 ?>

	<?php foreach(range(1,100) as $row): ?>
		
		<?php if (($row-1) % 10 == 0): ?>
			<p class="lead"><?php echo $areas[$area] ?></p>
			<table class="table table-bordered table-striped table-result table-individual">
				<thead>
					<tr>
						<th width="16.67%">Paper</th>
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
						<td class=""><strong>#<?php echo $row ?></strong></td>
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
			<td width="16.67%" class="metadata">Total</td>
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

<?php include 'footer.php' ?>