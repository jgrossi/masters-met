@extends('layout')

@section('content')
<div class="container box box-collection-papers">
	
	<h2>Manually Extracted Metadata</h2>

	<p class="lead text-center">
        {{ $collection->name }} | JSON File<br>
        <span class="text-muted">Papers in Collection: {{ $collection->papers()->count() }}</span>
    </p>

	<pre><code class="json">{!! $file_content !!}</code></pre>

</div>
@endsection
