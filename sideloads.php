<?php
include('config.php');
include('fns.php');
switch ($_GET['q']) {
  case 'infos':
  $url = 'https://newsapi.org/v2/top-headlines?country='.$country.'&sortBy=popularity&pageSize=15&apiKey='.$newsapi;
  $content = json_decode(file_get_contents($url));
  $infos = $content->articles;
  foreach($infos as $info) {
    $id = 'a'.uniqid(md5(rand()));
    if($info->description !== '') {
      $cont = $info->description;
    }else {
      $cont = $info->content;
    }
  echo '<button type="button" class="btn btn-link infos-link" style="color:white;" data-toggle="modal" data-target="#'.$id.'"><img src="news.png" width="20px"> '.$info->title.'</button><br>
  <div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="'.$id.'" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$info->title.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       '.$cont.'
      </div>
    </div>
  </div>
</div>
  ';
  }
    break;


    case 'wea':
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
  $hr = $content->hourly;
  $cont = '<ul>';
  foreach ($hr->data as $nb => $cnt) {
    $tm = date("Y-m-d H", $cnt->time);
    if($cnt->icon == 'clear-day') $iconc = '<i class="wi wi-day-sunny"></i>';
  if($cnt->icon == 'clear-night') $iconc = '<i class="wi wi-night-clear"></i>';
  if($cnt->icon == 'rain') $iconc = '<i class="wi wi-raindrops"></i>';
  if($cnt->icon == 'snow') $iconc = '<i class="wi wi-snow"></i>';
  if($cnt->icon == 'sleet') $iconc = '<i class="wi wi-day-sleet"></i>';
  if($cnt->icon == 'wind') $iconc = '<i class="wi wi-windy"></i>';
  if($cnt->icon == 'fog') $iconc = '<i class="wi wi-fog"></i>';
  if($cnt->icon == 'cloudy') $iconc = '<i class="wi wi-cloudy"></i>';
  if($cnt->icon == 'partly-cloudy-day') $iconc = '<i class="wi wi-day-cloudy-high"></i>';
  if($cnt->icon == 'partly-cloudy-night') $iconc = '<i class="wi wi-night-alt-partly-cloudy"></i>';
    $cont = $cont.'<li><b>'.$tm.'h : </b> '.$iconc.' <span style="font-size:25px;">'.$cnt->temperature.'<span style="color:lightgray">°</span></span> - '.$cnt->summary.'</li>';
  }
  $cont = $cont.'</ul>';
  echo '<p style="text-align:center;" data-toggle="modal" data-target="#meteomod">'.$icon.' <span style="font-size:25px;">'.$wea->temperature.'<span style="color:lightgray">°</span></span></p>

  <div class="modal fade" id="meteomod" tabindex="-1" role="dialog" aria-labelledby="meteomod" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.trans('next').' 48h - '.$hr->summary.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       '.$cont.'
      </div>
    </div>
  </div>
</div>

  ';
      break;
}
