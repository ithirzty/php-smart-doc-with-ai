<?php
finiv:
if(!$text) {
  $text = $fail;
}
$text = htmlspecialchars($text);
echo <<<ENDHEREDOC
$code
<script src="//code.responsivevoice.org/responsivevoice.js?key=$responsivevoiceapi"></script>
<div id="ai" style="position:absolute;left:calc(100% - 250px);width:250px !important;padding:20px;border-color:white;height:500px;border-radius:7px;top:20px;overflow-y:scroll;">
 <img style="-moz-box-shadow: inset 0 0 10px #000000;width:220px !important;text-align:center;" src="" id="gif">
 <h5 style="color:white;font-family:'Helvetica';" id="text" >$text</h5>
 <button onclick="cancel();" class="btn btn-danger" style="width:64px;margin-left:auto;margin-right:auto;">STOP</button>
 </div>
<script>

function voiceStartCallback() {
 document.getElementById('gif').src = './talk.gif';
}

function voiceEndCallback() {
  document.getElementById('gif').src = '';
 document.getElementById('ai').style.display = 'none';
document.getElementById('text').innerHTML = '';
}

var parameters = {
  onstart: voiceStartCallback,
  onend: voiceEndCallback
}

responsiveVoice.speak("$text", "$voice", parameters);

function cancel() {
responsiveVoice.cancel();
document.getElementById('gif').src = '';
 document.getElementById('ai').style.display = 'none';
document.getElementById('text').innerHTML = '';
}
</script>
ENDHEREDOC;
