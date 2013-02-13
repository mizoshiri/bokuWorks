<?php
class Flickr
{
  const FLICKR_API_URL = 'http://api.flickr.com/services/rest/?';

  public function __construct()
  {
    $this->apiKey = FLICKR_API_KEY;
  }

  public function getImages($keyword, $limit = 30, $sizeName = 'small', $attributes = null)
  {

    # http://www.flickr.com/services/api/flickr.photos.search.html
    $query = http_build_query(
      Array(
       'method' => 'flickr.photos.search',
       'api_key' => $this->apiKey,
       'text' => $keyword,
       'sort' => 'interestingness-desc',
       'per_page' => $limit
      )
    );
    $curl = curl_init(self::FLICKR_API_URL);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($curl);
    curl_close($curl);
    $data = simplexml_load_string($data);

    foreach($data->photos->photo as $photo) {
      $results[]['url'] = $this->getImageUrl($photo, 'small');
    }
    return $results;
  }

  # get severl size img url
  private function getImageUrl($photo, $sizeName)
  {
    /*
     * s  small square 75x75
     * t  thumbnail, 100 on longest side
     * m  small, 240 on longest side
     * -  medium, 500 on longest side
     * z  medium 640, 640 on longest side
     * b  large, 1024 on longest side*
     * o  original image, either a jpg, gif or png, depending on source format
     */

    $size = Array(
      'small_square' => '_s',
      'thumbnail' => '_t',
      'small' => '_m',
      'medium' => '',
      'medium2' => '_z',
      'large' => '_b',
      'original' => '_o'
    );

    $url = 'http://farm'.$photo['farm'].'.static.flickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret']. $size[$sizeName] . '.jpg';
    return $url;
  }
}