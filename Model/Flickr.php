<?php

class Flickr extends Model
{

  // public function __construct($key)
  // {
  //   $this->Apikey = $key;
  // }

  const FLICKR_API_URL = 'http://api.flickr.com/services/rest/?';

  # set key
  public function setFlickrApikey($key)
  {
    $this->Apikey = $key;
  }

  public function getImages($keyword, $limit = 30, $sizeName = 'small', $attributes = null)
  {
    $query = http_build_query(
      Array(
       'method' => 'flickr.photos.search',
       'api_key' => $this->Apikey,
       'text' => $keyword,
       'sort' => 'interestingness-desc',
       'per_page' => $limit
      )
    );
    $data = simplexml_load_file(self::FLICKR_API_URL . $query) or die("XML Error");
    return $data->photos;
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