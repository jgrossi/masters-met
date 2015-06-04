<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Metadata Extraction Tool | Paperant</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="csrf-param" content="_token" />
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" href="{{ asset('/assets/app.css') }}">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">Metadata Extraction Tool</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class=""><a href="{{ url('extractions') }}">Extractions</a></li>
				<li class=""><a href="{{ url('collections') }}">Collections</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class=""><a href="{{ route('extractions.last') }}" class="btn-last-extraction-top">Last Extraction</a></li>
				<li class="">
					<a href="{{ route('extractions.create') }}" class="btn-new-extraction-top">
						New Extraction
					</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

@yield('content')

<footer>
	<span class="text-muted">Metadata Extraction Tool</span> developed by <a href="http://grossi.io">Junior Grossi</a> as part of his <a href="#">Master's thesis</a> in <a href="http://eci.ufmg.br" target="_blank">Information Science</a>.
</footer>

<script type="text/javascript"> var request_path = "{{ Request::url() }}"; </script>
<script type="text/javascript" src="{{ asset('/assets/app.js') }}"></script>

</body>
</html>