<?php
function time_elapsed_string($date, $rcs = 0) {
  if(empty($date)) {
        return "No date provided";
    }
   
    $periods         = array("second", "minute", "heur", "jour", "semaine", "mois", "an", "décennie");
    $lengths         = array("60","60","24","7","4.35","12","10");
   
    $now             = time();
    $unix_date         = strtotime($date);
   
       // check validity of date
    if(empty($unix_date)) {   
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {   
        $difference     = $now - $unix_date;
        $tense         = "depuis";
       
    } else {
        $difference     = $unix_date - $now;
        $tense         = "depuis";
    }
   
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
   
    $difference = round($difference);
   
    if($difference != 1) {
        $periods[$j].= "s";
    }
   
    return "{$tense} $difference $periods[$j] ";
} 

?>