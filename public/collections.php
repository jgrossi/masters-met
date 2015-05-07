<?php include 'header.php' ?>

<div class="container box box-collections">
	<h2>Collections</h2>
	<form method="post">
		<table class="table table-bordered table-result table-striped">
			<thead>
				<tr>
					<th width="6%"></th>
					<th width="45%">Name</th>
					<th width="13%">Papers</th>
					<th width="13%">Status</th>
					<th width="">Created at</th>
				</tr>
			</thead>
			<tbody>
				<?php $collections = ['Masters Collection #1', 'Biological Collection #4', 'Universal Musical Collection', 'Civil Engineer Collection', 'Civil Engineer Collection #2', 'Civil Engineer Collection #3', 'Computer Science IEEE Collection'] ?>
				<?php $statuses = ['success' => 'New', 'info' => 'Extracted'] ?>
				<?php foreach($collections as $i => $collection): ?>
				<tr>
					<td class="text-center"><input type="radio" name="collection_id" id=""></td>
					<td><?php echo $collection ?></td>
					<td><?php echo rand(30,100) ?></td>
					<?php $status_key = array_rand($statuses) ?>
					<?php $status_value = $statuses[$status_key] ?>
					<td><label class="label label-<?php echo $status_key ?>"><?php echo $status_value ?></label></td>
					<td><?php echo date('Y-m-d H:i:s') ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="text-right">
			<button class="btn btn-danger">Remove</button>
			<a href="new-collection.php" class="btn btn-primary">New Collection</a>
		</div>
	</form>
</div>

<?php include 'footer.php' ?>