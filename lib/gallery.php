<?php

require_once('classes/SimpleCache.php');
require_once('classes/PicasaAPI.php');

class SharanAlbums {
  private $_usernames, $_cache_interval, $_picasa, $_per_page;
  public $albums = array();

  public function __construct($usernames, $per_page = 40) {
    $this->_picasa = new PicasaAPI();

    $this->_per_page = $per_page;

    // Cache interval in minutes
    $this->_cache_interval = 60;

    if ($usernames) {
      $this->_usernames = $this->format_usernames($usernames);
      $this->get_albums();
    }
  }

  public function album_page($page) {
    $page = max(1, $page);
    return array_slice($this->albums, ($page - 1) * $this->_per_page, $this->_per_page);
  }

  public function num_pages() {
    return ceil((float)count($this->albums) / $this->_per_page);
  }

  private function get_albums() {
    $this->albums = array();

    foreach($this->_usernames as $username) {
      $this->albums = array_merge($this->albums, $this->get_user_albums($username));
    }

    $this->sort_albums();
  }

  private function sort_albums() {
    usort($this->albums, function ($a, $b) {
      return $b->date - $a->date;
    });
  }

  private function get_user_albums($username) {
    $cache_file = CACHE_DIRECTORY . 'albums-' . $username . '.json';
    $cache = new SimpleCache(
      array($this->_picasa, 'getAlbumsJSON'),
      array($username),
      $cache_file,
      $this->_cache_interval
    );
    return json_decode($cache->get());
  }

  private function format_usernames($usernames) {
    return array_map('trim', explode(',', $usernames));
  }
}