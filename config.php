<?php 

require __DIR__.'/vendor/autoload.php';

function dd($data)
{
	var_dump($data);
	exit();
}

function beep($times = 1)
{
	foreach (range(1, $times) as $key => $value) {
		fwrite(STDERR, "\007");
	}
}

function getextension($file)
{
	return substr($file, strrpos($file, '.') + 1);
}

function getfilename($file, $withext = true)
{
	$filename = substr($file, strrpos($file, '/') + 1);

	if ($withext) return $filename;

	return substr($filename, 0, strrpos($filename, '.'));
}


