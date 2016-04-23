<?php

  require_once('lib/init.php');
  $selectedBg = unsplash();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Uptime Statistics</title>
    <link rel="stylesheet" href="gfx/style.css" />
    <style type="text/css">
    body{
        background: url(<?php echo $selectedBg; ?>) no-repeat center center;
        background-size: cover;
        /* Backgrounds by https://unsplash.com/ `*/
    }
    </style>
     
</head>
<body>

    <div class="transparent">
        <div class="field">
            <center>
				<img src="<?php echo $config['logo']; ?>" class="logo" />
				<br/>
				<small>UPTIME STATISTICS
            </center>
            <br/>

<?php 

//var_dump($results);
$print = getOverall($results); 


// 24 Hour Ratio
        echo "<h4 class='positive'>".$print['day']."%</h4> 
        <span class='ratio-title'><p>last 24 hours</p></span>";

// 7 day ratio
        echo "<h4 class='positive'>".$print['week']."%</h4> 
        <span class='ratio-title'><p>last 7 days</p></span>";

// 30 day ratio
        echo "<h4 class='positive'>".$print['month']."%</h4> 
        <span class='ratio-title'><p>last 30 days</p></span>";

//All Time Ratio
        echo "<h4 class='positive' style='margin-top:30px'>".$print['alltime']."%</h4> 
            <span class='ratio-title'><p>from the start</p></span>";

?>

        </div>
    </div>
      
    <div id="footer" class="transparent">
        <center>
            Servers are monitored by<a href="https://uptimerobot.com/" target="_blank" class="uptime-logo"><img src="gfx/uptime-logo.png" border="0" /></a>
            <small>
                Code used here is on <a href="https://github.com/l3dlp/PHP-UptimeRobot-Dashboard" target="_blank">GitHub</a>.
                <br/>Nice backgrounds come from <a href="https://unsplash.com/" target="_blank">Unsplash</a>
            </small>
        </center>
    </div>

</body>
</html>
