<?php
$data = $_GET['message'];
//COMMANDS
function command($rec, $say, $tol, $wri) {
  global $data;
  global $text;
  global $code;
  if(!$text) {
  if(!$tol) $tol = 2;
  foreach($rec as $sen) {
    if(strpos($sen, '[...]') !== false) {
      $vsen = str_replace('[...]', '', $sen);
      if(strpos($data, $vsen) !== false) {
      $var = explode($vsen, $data)[1];
      return $var;
      $text = $say[rand(1, count($say))-1];
      if($wri) {
      $code = $wri[rand(1, count($wri))-1];
      }
      }
    }else {
    if(levenshtein($sen, $data) <= $tol) {
$text = $say[rand(1, count($say))-1];
$code = $wri;
    }
  }
  }
}
}
//WEATHER
function weather($i) {
  global $darkskyapi;
  global $location;
  global $lang;
$url = 'https://api.darksky.net/forecast/'.$darkskyapi.'/'.$location.'?lang='.$lang.'&units=auto';
$content = json_decode(file_get_contents($url));
$wea = $content->currently;
if($wea->icon == 'clear-day') $icon = '<i class="wi wi-day-sunny"></i>';
if($wea->icon == 'clear-night') $icon = '<i class="wi wi-night-clear"></i>';
if($wea->icon == 'rain') $icon = '<i class="wi wi-raindrops"></i>';
if($wea->icon == 'snow') $icon = '<i class="wi wi-snow"></i>';
if($wea->icon == 'sleet') $icon = '<i class="wi wi-day-sleet"></i>';
if($wea->icon == 'wind') $icon = '<i class="wi wi-windy"></i>';
if($wea->icon == 'fog') $icon = '<i class="wi wi-fog"></i>';
if($wea->icon == 'cloudy') $icon = '<i class="wi wi-cloudy"></i>';
if($wea->icon == 'partly-cloudy-day') $icon = '<i class="wi wi-day-cloudy-high"></i>';
if($wea->icon == 'partly-cloudy-night') $icon = '<i class="wi wi-night-alt-partly-cloudy"></i>';
switch($i) {
  case 1:
  return $wea->temperature;
  break;
  case 2:
  return $wea->summary;
  break;
  case 3:
  return $icon;
  break;

}
}

//WIKIPEDIA

function wiki($rec, $say) {
  global $data;
  global $text;
  global $code;
  if(!$text) {
  foreach($rec as $sen) {
  $vsen = str_replace('[...]', '', $sen);
  if(strpos($data, $vsen) !== false) {
  $obj = explode($vsen, $data)[1];

        $opts = array('http' =>
          array(
            'user_agent' => 'smart doc v1'
          )
        );
        $context = stream_context_create($opts);
        $url = 'https://fr.wikipedia.org/api/rest_v1/page/summary/'.ucfirst(strtolower($obj)).'?origin=localhost&redirect=1&format=json';
          $content = json_decode(file_get_contents($url, FALSE, $context));
        if($content->coordinates) {
          $map = $content->coordinates;
          $width = '425';
          $height = '350';
          $src = 'https://www.openstreetmap.org/export/embed.html?bbox='.$map->lon.'%2C'.$map->lat.'&layer=mapnik';
        }else {
          $imgurl = $content->thumbnail;
          $width = $imgurl->width;
          $height = $imgurl->height;
          $src = $imgurl->source;
        }
         $text = $content->extract;
              $code = '<iframe frameborder="0" style="width:'.$width.'px;height:'.$height.'px;position:absolute;top:50px;left:300px;" id="ifrgif" src="'.$src.'"></iframe>
                <script>
             document.getElementById(\'continf\').style.display = \'none\';
              var timer = setTimeout(function() {
                      document.getElementById(\'continf\').style.display = \'block\';
           document.getElementById(\'ifrgif\'). style.display=\'none\';
           clearTimeout(timer);
        }, 10000);
                </script>';
          if(strlen($text) < 1) {
            $text = 'I didn\'t found '.$obj.'.';
          }
        }
}
$pretext = $say[rand(1, count($say))-1];
$text = str_replace('[...]', $text, $pretext);
}
}


//GIPHY

function gif($rec, $say) {
  global $data;
  global $text;
  global $code;
  if(!$text) {
  foreach($rec as $sen) {
  $vsen = str_replace('[...]', '', $sen);
  if(strpos($data, $vsen) !== false) {
  $keyword = explode($vsen, $data)[1];
  $url = 'https://api.giphy.com/v1/gifs/random?api_key='.$giphyapi.'&tag='.$keyword.'&limit=1';
    $content = json_decode(file_get_contents($url));
    $gif = $content->data;
    $url = $gif->embed_url;
          $text = 'And there is your gif of '.$keyword.'.';
          $code = '<iframe frameborder="0" style="pointer-events: none;width255:px;height:255px;position:absolute;top:50px;left:300px;" id="ifrgif" src="'.$url.'"></iframe>
          <script>
          document.getElementById(\'continf\').style.display = \'none\';
        var timer = setTimeout(function() {
                document.getElementById(\'continf\').style.display = \'block\';
     document.getElementById(\'ifrgif\'). style.display=\'none\';
     clearTimeout(timer);
  }, 30000);
          </script>';
          $pretext = $say[rand(1, count($say))-1];
          $text = str_replace('[...]', $text, $pretext);
}
}
}
}
function trans($enword) {
global $lang;
switch ($lang) {
  case 'en':
    return $enword;
    break;
  case 'fr':
      if($enword == 'next') return 'prochaines';
      if($enword == 'NEWS') return 'ACTUALITÉS';
      break;
  default:
    return $enword;
      break;
}

}
