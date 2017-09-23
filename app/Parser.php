<?php

namespace App;

use Sunra\PhpSimple\HtmlDomParser;

class Parser {

	public $message;

	public function __construct($msg) {
		$this->message = $msg;
	}

	public function index() {

	$page = "https://bitinfocharts.com/ru/markets/";

	$html = HtmlDomParser::str_get_html($page);

	var_dump($html);

	}
}

?>