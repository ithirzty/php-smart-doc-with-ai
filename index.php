<?php
session_start();
include('config.php');
include('fns.php');
 ?>
<!DOCTYPE html>
<html lang=fr>
<head>
<meta charset=utf-8>
 <script src="//code.responsivevoice.org/responsivevoice.js?key=<?php echo $responsivevoiceapi; ?>"></script>
<meta name=viewport content="width=device-width, initial-scale=1">
<link href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css rel=stylesheet integrity=sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T crossorigin=anonymous>
<link rel=stylesheet href=./weather-icons.css>
</head>
<body id=ecran>
<style>html,body{margin:0;height:100%;background:url('./imgs/img<?php echo rand(1, $nbimgs).'.'.$extimg; ?>') center center / cover no-repeat fixed;height:100%;color:white}#loads{width:80%;margin-left:auto;margin-right:auto}::-webkit-scrollbar{width:0}#time,#date{color:white;font-family:'Helvetica';font-size:30px;text-align:center}#dt{width:300px}#infos{padding:30px;height:172px;overflow-y:scroll}.modal-content{background-color:#000;border:white 1px solid}.close{color:white}.container{margin:30px}.cont-infos{position:absolute;bottom:0;left:25px;width:750px}.modal-backdrop{pointer-events:none;background-color:transparent}.wi{font-size:30px}sup{font-size:10px}#bright{background-color:rgba(0,0,0,0.3);width:100%;height:100%;padding:10px}#nightshift{position:fixed;width:100%;height:100%;background-color:#ffa339;opacity:.2;pointer-events:none;content:' ';z-index:99999}</style>
<div id=nuit style=display:none;width:100%;height:100%;background-color:black;position:absolute;z-index:99></div>
<div id=nightshift></div>
<div id=bright>
<script src=https://cdn.jsdelivr.net/npm/typed.js@2.0.9></script>
<div id=dt>
<div id=date></div>
<div id=time></div>
<div id=wea></div>
</div>
<div class="container cont-infos" id=continf>
<h5><?php echo trans('NEWS'); ?></h5>
<div id=infos></div>
</div>
<div id=ia>
</div>
<div id=dropDownSelect1></div>
</div>
<script src=https://code.jquery.com/jquery-3.4.0.min.js integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin=anonymous></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js></script>
<script>$(document).ready(function(){setInterval(function(){var momentNow=moment();$('#date').html(momentNow.format('YYYY MMMM DD')+' '
+momentNow.format('dddd').substring(0,3).toUpperCase());$('#time').html(momentNow.format('HH:mm:ss'));},100);$('#infos').load('sideloads?q=infos');var click=0;setInterval(function(){if($('body').attr('class')=='modal-open'){}else{if($('body').delay(1000).attr('class')=='modal-open'){}else{$('#infos').load('sideloads?q=infos');}}},10000);$('#wea').load('sideloads?q=wea');setInterval(function(){if($('body').attr('class')=='modal-open'){}else{if($('body').delay(1000).attr('class')=='modal-open'){}else{$('#wea').load('sideloads?q=wea');}}},100000);});setInterval(function(){var rand=Math.floor(Math.random()*<?php echo $nbimgs; ?>);document.getElementById('ecran').style.background='url("./imgs/img'+rand+'.<?php echo $extimg; ?>") center center / cover no-repeat fixed';},60000);navigator.mediaDevices.getUserMedia({audio:true}).then(function(stream){console.log('You let me use your mic!')}).catch(function(err){console.log('No mic for you!')});if(annyang){annyang.debug();annyang.setLanguage('fr-FR');annyang.addCommands({'<?php echo $ainame; ?> *suite':function(suite){$('#ia').load('commands?message='+encodeURIComponent(suite));},});annyang.start();}</script>
<script src=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js integrity=sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM crossorigin=anonymous></script>
<script src=https://use.fontawesome.com/bc7395096d.js></script>
</body>
</html>
