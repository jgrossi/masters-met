<?php include 'header.php' ?>

<div class="container box box-results">
	<h2>Previous Metadata Extractions</h2>
	<table class="table table-bordered table-result table-striped table-last-results">
		<thead>
			<tr>
				<th width="72%" colspan="3" class="no-borde text-center"></th>
				<th width="28%" colspan="4" class="text-center">Confiability Indexes</th>
			</tr>
			<tr>
				<td class="metadata" width="17%" colspan="2">Extraction #</td>
				<td class="metadata" width="37%">Collection</td>
				<td class="metadata" width="18%">Date</td>
				<td class="metadata tool" width="7%">C</td>
				<td class="metadata tool" width="7%">CS</td>
				<td class="metadata tool" width="7%">CR</td>
				<td class="metadata tool" width="7%">PC</td>
			</tr>
		</thead>
		<tbody>
		<?php $collections = ['Masters Collection #1', 'Biological Collection #4', 'Universal Musical Collection', 'Civil Engineer Collection', 'Civil Engineer Collection #2', 'Civil Engineer Collection #3', 'Computer Science IEEE Collection'] ?>
		<?php foreach(range(1,12) as $i => $metadata): ?>
			<?php $rand = rand(0, count($collections)-1) ?>
			<tr class="<?php echo $i == 0 ? '' : '' ?>">
				<td class="metadata">
					<?php if ($i == 0): ?>
						<span class="label label-info">Running</span>
					<?php elseif ($i == 4): ?>	
						<span class="label label-danger">Failed</span>
					<?php else: ?>
						<a href="extraction.php">+ <?php echo rand(123,767) ?></a>
					<?php endif ?>
				</td>
				<td class="text-center" width="5%">
					<?php if ($i == 0): ?>
						<i class="fa fa-spinner fa-spin text-info"></i>
					<?php elseif ($i == 4): ?>	
						<a href="#">
							<span class="fa fa-question text-danger"></span>
						</a>
					<?php else: ?>
						<i class="fa fa-check-circle-o text-success"></i>
					<?php endif ?>
				</td>
				<td><?php echo $collections[$rand] ?></td>
				<td class="text-muted"><?php echo date('Y-m-d H:i') ?></td>
				<?php $classes = ['success', 'warning', 'danger'] ?>
				<td class="bg-<?php echo $i > 0 ? $classes[rand(0,2)] : '' ?>">
					<?php if ($i > 0): ?>
						<?php echo number_format(rand(9400, 10000)/100, 2) ?>
					<?php endif ?>
				</td>
				<td class="bg-<?php echo $i > 0 ? $classes[rand(0,2)] : '' ?>">
					<?php if ($i > 0): ?>
						<?php echo number_format(rand(9400, 10000)/100, 2) ?>
					<?php endif ?>
				</td>
				<td class="bg-<?php echo $i > 0 ? $classes[rand(0,2)] : '' ?>">
					<?php if ($i > 0): ?>
						<?php echo number_format(rand(9400, 10000)/100, 2) ?>
					<?php endif ?>
				</td>
				<td class="bg-<?php echo $i > 0 ? $classes[rand(0,2)] : '' ?>">
					<?php if ($i > 0): ?>
						<?php echo number_format(rand(9400, 10000)/100, 2) ?>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<!-- <hr> -->
	<!-- <p class="text-muted text-left">Showing only last 20 extractions.</p> -->
</div>

<?php include 'footer.php' ?>