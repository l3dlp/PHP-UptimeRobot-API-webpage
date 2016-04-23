<?php
ini_set('display_errors', '1');

/*

Uptime Robot API Scripts

@Author: L3DLP
@Date: 23/04/16

@Author: Adam Matthews
@Date: 20/10/14

API forked from ckdarby/PHP-UptimeRobot
*/

require_once('lib/config.php');
require_once('lib/API.php');
use UptimeRobot\API;

try {

    //Initalizes API with config options
    $api = new API($config);
    //Define parameters for our getMethod request
    $args = [
        'showTimezone' => 1,
        'customUptimeRatio' => '1-7-30'
    ];

    //Makes request to the getMonitor Method
    $results = $api->request('/getMonitors', $args);

    //Output json_decoded contents
    //var_dump($results);

} catch (Exception $e) {
    echo $e->getMessage();
    //Output various debug information
    var_dump($api->debug);
}

// Get Overall Uptime Stats for day, week, month and all time. 
function getOverall($results){
    //blank vars
    $day = 0;
    $week = 0;
    $month = 0;
    $alltime = 0;
    
    //loop over all monitors
    foreach($results as $x){
 		if (is_array($x)){	
	        foreach($x['monitor'] as $y){
                //grab the day-week-month ratio and split up
	        	$ratios = explode("-",$y['customuptimeratio']);
                //update running total of uptime stats
	        	$day += $ratios[0];
	        	$week += $ratios[1];
	        	$month += $ratios[2];
                //add to the all time ratio var
                $alltime += $y['alltimeuptimeratio'];
	        }
	    }
    }

    //calculate actual uptime by dividing total number of montiors by the large values. 
   	$day = round($day / $results["total"],2);
   	$week = round($week / $results["total"],2);
   	$month = round($month / $results["total"],2);
   	$alltime = round($alltime / $results["total"],2);

    //generate array of all outputs
   	$output = compact("day", "week", "month", "alltime");

    return $output;
}

// Get a nice background each time :)
function unsplash() {

  // array of backgrounds filenames
  $bg = array('https://unsplash.imgix.net/reserve/QGXfT1CkRpmvlwtPpgul_IMG_0558.jpg?q=75&fm=jpg&s=25c25f99c3faba09b92aacf40a9e9de5', 'https://unsplash.imgix.net/uploads/141223808515744db9995/3361b5e1?q=75&fm=jpg&s=04607c34357b70db74394f2fd8a6db7f', 'https://unsplash.imgix.net/reserve/z7R1rjT6RhmZdqWbM5hg_R0001139.jpg?q=75&fm=jpg&s=26fc77c65835d1d8e2bcffb8b91a1b93');

  // generate random number size of the array
  $i = rand(0, count($bg)-1);
  
  // set variable equal to which random filename was chosen
  return $bg[$i];
}
