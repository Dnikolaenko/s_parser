<?php

namespace App;

class Config {

  protected static $_instance;

  public static $synonyms_url = 'https://raw.githubusercontent.com/dwyl/english-words/master/words.txt';

  public static $parsing_url = 'http://www.wordreference.com/synonyms/';

  public static $path_to_download = __DIR__  . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "download_files" . DIRECTORY_SEPARATOR;

  public static $search_tag = ".content div#article";

  public static $db_name = "parsing";

  public static $db_collection = "synonyms";


  private function __construct() {
  }

  public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

  private function __clone() {
  }

  private function __wakeup() {
  }

  /**
  * Download page and return formated result
  * @param string $url
  * @return string
  */
  public static function get_page($url) {
    $ch = curl_init(); //init curl
    curl_setopt($ch, CURLOPT_URL, $url); // connect to url
    curl_setopt($ch, CURLOPT_REFERER, $url); // where did
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36"); // cross-browser compatibility
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return web-page
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // proceed to redirect

    $result = curl_exec($ch); // execute query

    curl_close($ch); // close connection

    return mb_convert_encoding($result, 'UTF-8'); // return formated result
  }

}
?>
