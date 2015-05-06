<?php include 'header.php' ?>

<div class="container box box-results">
	<h2>Previous Metadata Extractions</h2>
	<table class="table table-bordered table-result table-striped table-last-results">
		<thead>
			<tr>
				<th width="72%" colspan="3" class="no-borde"></th>
				<th width="28%" colspan="4" class="text-center">Confiability Indexes</th>
			</tr>
			<tr>
				<td class="metadata" width="17%">Extraction</td>
				<td class="metadata" width="18%">Date</td>
				<td class="metadata" width="37%">Collection</td>
				<td class="metadata tool" width="7%">C</td>
				<td class="metadata tool" width="7%">CS</td>
				<td class="metadata tool" width="7%">CR</td>
				<td class="metadata tool" width="7%">PC</td>
			</tr>
		</thead>
		<tbody>
		<?php $collections = ['Masters Collection #1', 'Biological Collection #4', 'Universal Musical Collection', 'Civil Engineer Collection', 'Civil Engineer Collection #2', 'Civil Engineer Collection #3', 'Computer Science IEEE Collection'] ?>
		<?php foreach(range(1,12) as $metadata): ?>
			<?php $rand = rand(0, count($collections)-1) ?>
			<tr>
				<td><a href="result.php"><?php echo uniqid() ?></a></td>
				<td class="text-muted"><?php echo date('Y-m-d H:i') ?></td>
				<td><?php echo $collections[$rand] ?></td>
				<?php $classes = ['success', 'warning', 'danger'] ?>
				<td class="text-<?php echo $classes[rand(0,2)] ?>"><?php echo number_format(rand(9400, 10000)/100, 2) ?></td>
				<td class="text-<?php echo $classes[rand(0,2)] ?>"><?php echo number_format(rand(9400, 10000)/100, 2) ?></td>
				<td class="text-<?php echo $classes[rand(0,2)] ?>"><?php echo number_format(rand(9400, 10000)/100, 2) ?></td>
				<td class="text-<?php echo $classes[rand(0,2)] ?>"><?php echo number_format(rand(9400, 10000)/100, 2) ?></td>
			</tr>
		<?php endforeach; ?>
			<!-- <tr>
				<td></td>
				<td><a href="individual-results.php" class="">Individual results</a></td>
				<td><a href="individual-results.php" class="">Individual results</a></td>
				<td><a href="individual-results.php" class="">Individual results</a></td>
				<td><a href="individual-results.php" class="">Individual results</a></td>
			</tr> -->
		</tbody>
	</table>
</div>

<?php include 'footer.php' ?>