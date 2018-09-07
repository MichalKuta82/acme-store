<?php

use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;

function view($path, array $data = [])
{

	$view = __DIR__ . '/../../resources/views';
	$cache = __DIR__ . '/../../bootstrap/cache';

	$blade = new Blade($view, $cache);
	echo $blade->view()->make($path, $data)->render();
}

function make($filename, $data)
{
	extract($data);

	//turn on output buffering
	ob_start();

	//include template
	include (__DIR__ . '/../../resources/views/emails/' . $filename . '.php');

	// get content of the file
	$content = ob_get_contents();

	//erease the output and turn off output buffering
	ob_end_clean();

	return $content;

}

function slug($value)
{
	//remove all charcters not in this list: undescore '_' | letters 'pL' | numbers 'pN' | whitespace 's'
	$value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));

	//replace underscore with dash '-'
	$value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

	//replace whitespace
	return trim($value, '-');
}

function paginate($num_of_records, $total_record, $table_name, $object)
{

	$pages = new Paginator($num_of_records, 'p');
	$pages->set_total($total_record);

	$data = Capsule::select("SELECT * FROM $table_name ORDER BY created_at DESC" . $pages->get_limit());

	$categories = $object->transform($data);

	return [$categories, $pages->page_links()];
}