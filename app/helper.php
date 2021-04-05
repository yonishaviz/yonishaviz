<?php
function productImage($path)
{

	return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('image/not-found.jpg');
}