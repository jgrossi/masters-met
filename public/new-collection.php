<?php include 'header.php' ?>

<div class="container box box-new-collection">
	<h2>New Collection</h2>
	<form id="new-collection">
		<div class="form-group">
			<input type="text" name="name" placeholder="Collection name" class="form-control">
		</div>
		<div class="form-group">
			<p>
				<button class="btn btn-default btn-block btn-select-csv">Select CSV file</button>
			</p>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
				100%
				</div>
			</div>
			<div class="text-center text-muted">
				<strong>156 papers</strong> found in the CSV file!
			</div>
		</div>
		<div class="form-group">
			<p>
				<button class="btn btn-default btn-block btn-upload-papers" disabled="disabled">Upload papers files</button>
			</p>
			<div class="progress">
				<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
					<!-- 0% -->
				</div>
			</div>
			<div class="text-center text-muted">
				<strong>156 papers</strong> uploaded!
			</div>
			<!-- <p class="loading-percent">
				37%
			</p> -->
		</div>
		<div class="form-group">
			<hr>
			<button class="btn btn-primary btn-lg btn-extract-now" disabled="disabled">Save & Extract</button>
			<button class="btn btn-info btn-lg pull-right btn-just-save" disabled="disabled">Save</button>
		</div>
		<div class="text-center">
			<a href="index.php">Go back to collections list</a>
		</div>
	</form>
</div>

<?php include 'footer.php' ?>