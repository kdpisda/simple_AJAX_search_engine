<?php

$xmlDoc=new DOMDocument();
$xmlDoc->load("kdp.xml");

$x=$xmlDoc->getElementsByTagName('item');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('link');
    $d=$x->item($i)->getElementsByTagName('description');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint='<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">'.
                    '<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">'.
                        '<i class="material-icons">&#xE80C;</i>'.
                    '</header>'.
                        '<div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">'.
                            '<div class="mdl-card__supporting-text">'.
                                '<h4>'.
                                    $y->item(0)->childNodes->item(0)->nodeValue .
                                '</h4>'.
                                $d->item(0)->childNodes->item(0)->nodeValue.
                            '</div>'.
                            '<div class="mdl-card__actions">'.
                                '<a href="'.
                                    $z->item(0)->childNodes->item(0)->nodeValue .
                                '" target="_blank" class="mdl-button">Read More</a>'.
                            '</div>'.
                        '</div>'.
                    '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn1">'.
                        '<i class="material-icons">more_vert</i>'.
                    '</button>'.
                    '<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn1">'.
                    '<li class="mdl-menu__item">Lorem</li>'.
                    '<li class="mdl-menu__item" disabled>Ipsum</li>'.
                    '<li class="mdl-menu__item">Dolor</li>'.
                    '</ul>'.
                '</section>';
        } else {
          $hint=$hint .'<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">'.
                    '<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">'.
                        '<i class="material-icons">&#xE80C;</i>'.
                    '</header>'.
                        '<div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">'.
                            '<div class="mdl-card__supporting-text">'.
                                '<h4>'.
                                    $y->item(0)->childNodes->item(0)->nodeValue .
                                '</h4>'.
                                $d->item(0)->childNodes->item(0)->nodeValue.
                            '</div>'.
                            '<div class="mdl-card__actions">'.
                                '<a href="'.
                                    $z->item(0)->childNodes->item(0)->nodeValue .
                                '" target="_blank" class="mdl-button">Read More</a>'.
                            '</div>'.
                        '</div>'.
                    '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn1">'.
                        '<i class="material-icons">more_vert</i>'.
                    '</button>'.
                    '<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn1">'.
                    '<li class="mdl-menu__item">Lorem</li>'.
                    '<li class="mdl-menu__item" disabled>Ipsum</li>'.
                    '<li class="mdl-menu__item">Dolor</li>'.
                    '</ul>'.
                '</section>';
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response= '<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">'.
            '<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">'.
              '<i class="material-icons">&#xE000;</i>'.
            '</header>'.
            '<div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">'.
              '<div class="mdl-card__supporting-text">'.
                '<h4><i class="material-icons">&#xE000;</i> The entered key does not match our database</h4>'.
                'Try using different and elaborative keywords to explore more'.
              '</div>'.
              '<div class="mdl-card__actions">'.
                '<a href="#" class="mdl-button">Read FAQ</a>'.
              '</div>'.
            '</div>'.
            '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn1">'.
              '<i class="material-icons">more_vert</i>'.
            '</button>'.
            '<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn1">'.
              '<li class="mdl-menu__item">Lorem</li>'.
              '<li class="mdl-menu__item" disabled>Ipsum</li>'.
              '<li class="mdl-menu__item">Dolor</li>'.
            '</ul>'.
          '</section>';
} else {
  $response=$hint;
}
?>
        <?php echo $response; ?>