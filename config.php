<?php




//PERSONAL INFOS
$name = ''; //the name by with you will be called by the ai
$location = '48.834190,2.316140'; //your coordinates (location)

//OTHER STUFF
$darkskyapi = ''; //your darksky private key
$giphyapi = ''; //your giphy private key
$responsivevoiceapi = ''; //your responsivevoice private key
$newsapi = '7facd3ce1e4a45ca82299b95fca6adf8'; //your newsapi.org privatekey
$lang = 'en'; //your language by two characters
$country = 'us'; //your country by two characters
$ainame = ''; //name of the ai (also the magic word)
$fail = 'Sorry, I didn\'t got it'; //what to say if the ai didn't understand
$voice = 'US English Male'; //voice name (https://responsivevoice.org/text-to-speech-languages/)
$extimg = 'gif'; //extension of the images of the imgs folder





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//PHP STUFF DO NOT TOUCH////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fi = new FilesystemIterator('./imgs', FilesystemIterator::SKIP_DOTS);//////////////////////////////////////////////////////////////////////////////////
$nbimgs = iterator_count($fi);//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
