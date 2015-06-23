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

function confindex($results)
{
	$confindex = [];

	foreach ($results as $tool => $values) {
		
		$t = $values['title'];
		$a = $values['authors'];
		$e = $values['emails'];
		$b = $values['abstract'];
		$r = $values['references'];

		$calc = ($t*5 + $a*4 + $e*1 + $b*3 + $r*4)/17;
		$confindex[$tool] = round($calc, 2);
	}

	return $confindex;
}

