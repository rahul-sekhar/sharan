<?php
/*
* Caches data to a local file which is updated through a callback function after a
* given time interval has expired
*/
class SimpleCache {
  private
    $_interval,
    $_cache_file,
    $_update_callback,
    $_arguments;

  public function __construct ($update_callback, $arguments, $cache_file, $interval = 10) {
    $this->_update_callback = $update_callback;
    $this->_arguments = $arguments;
    $this->_interval = $interval * 60; // Convert time to seconds
    $this->_cache_file = $cache_file;
  }

  /*
   * Updates cache if last modified is greater than
   * update interval and returns cache contents
   */
  public function get() {
    if (!file_exists($this->_cache_file) ||
        time() - filemtime($this->_cache_file) > $this->_interval) {
      return $this->_update_cache();
    } else {
      return file_get_contents($this->_cache_file);
    }
  }

  /*
   * Http expires date
   */
  public function get_expires_datetime() {
    if (file_exists($this->_cache_file)) {
      return date (
        'D, d M Y H:i:s \G\M\T',
        filemtime($this->_cache_file) + ($this->_interval)
      );
    }
  }

  /*
   * Makes the api call and updates the cache
   */
  private function _update_cache() {
    // Get fresh data
    $data = call_user_func_array($this->_update_callback, $this->_arguments);

    // Write it to the cache file
    $fp = fopen($this->_cache_file, 'w+'); // open or create cache
    if ($fp) {
      if (flock($fp, LOCK_EX)) {
        fwrite($fp, $data);
        flock($fp, LOCK_UN);
      }
      fclose($fp);
    }

    return $data;
  }

}