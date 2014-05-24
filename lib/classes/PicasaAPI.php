<?php
/* A minimal class to access the picasa api */

class PicasaAPI {
  private $timeout;
  private $url;

  public function __construct(array $config = array()) {
    $this->url = "https://picasaweb.google.com/data/feed/api/";

    if (isset($config['timeout'])) {
        $this->timeout = $config['timeout'];
    }
    else {
        $this->timeout = 10;
    }
  }

  public function getAlbums($user) {
    return $this->performRequest($this->url . 'user/' . $user);
  }

  public function getAlbumsJSON($user) {
    $xml_string = $this->getAlbums($user);
    $xml_string = str_replace('xmlns=', 'ns=', $xml_string);
    $xml = new SimpleXMLElement($xml_string);

    $albums = array();
    foreach($xml->entry as $entry) :
      $date = new DateTime((string)$entry->published);
      $albums[] = array(
        'id' => (string)$entry->id,
        'title' => (string)$entry->title,
        'num_photos' => (string)$entry->xpath('gphoto:numphotos')[0],
        'thumbnail' => (string)$entry->xpath('media:group/media:thumbnail')[0]['url'],
        'date' => $date->getTimestamp(),
        'url' => (string)$entry->xpath('link[@rel="alternate"]')[0]['href']
      );
    endforeach;

    return json_encode($albums);
  }

  public function getPhotos($user, $album) {
    return $this->performRequest($this->url . 'user/' . $user . '/albumid/' . $album);
  }

  private function performRequest($url) {
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => $this->timeout
    );

    $request = curl_init();
    curl_setopt_array($request, $options);
    $json = curl_exec($request);
    curl_close($request);

    return $json;
  }
}

?>