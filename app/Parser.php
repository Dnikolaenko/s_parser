<?php

namespace App;

use Sunra\PhpSimple\HtmlDomParser;
use App\Config;
use App\Database;

class Parser {

	// private $synonyms_url;
	//
	// private $parsing_url;
	//
	// private $download_path;
	//
	// private $base_name;
	//
	// private $base_collection;
	//
	// private $term;

	private $db;

	public function __construct() {
		Config::getInstance();
		// $this->synonyms_url = $config::$synonyms;
		// $this->parsing_url = $config::$parsing;
		// $this->download_path = $config::$path_to_download;
		// $this->base_name = $config::$db_name;
		// $this->base_collection = $config::$db_collection;
		// $this->term = $config::$search_tag;
	}

	/**
	* Parsing and save search_tag to mongodb
	*/
	public function index() {

	//start parsing script
	echo "Start parsing synonyms";

	// open synonyms file
	$synonyms = file(Config::$synonyms_url, FILE_IGNORE_NEW_LINES);

	// check synonyms or stop script
	if(!$synonyms or empty($synonyms)) die('Synonyms not found in source - ' . Config::$synonyms_url);

	// create db object
	$this->db = new Database(Config::$db_name, Config::$db_collection);

	// array searc_tags
	$tags = [];

  // Parse synonyms pages
  foreach ($synonyms as $word) {

			// curl get_page method
      $page = Config::get_page(Config::$parsing_url . $word);

      // save synonyms page to folder
     	$filename = $word . ".html";

			// put file in to download_path
      file_put_contents(Config::$path_to_download . $filename, $page);

      // find tag and save result to db
      $html = HtmlDomParser::str_get_html($page);
      // because we search tag with id, it's one in page
      foreach ($html->find(Config::$search_tag) as $res) {
          $tags[] = ['key' => $word, 'text' => $res->plaintext];
					if(!$res->plaintext || empty($res->plaintext)){
						$save = true;
					} else {
						$save = false;
					}
      }
      // check and save tags in db
      if(isset($tags[$this->db->db_parts])) {
					if($save == true){
          $this->db->insert($tags);
					}
          $tags = [];
      }
	}
	echo "Parsing finished";
	}
}

?>
