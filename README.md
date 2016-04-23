Smart webpage for UptimeRobot.com statistics
==============

Live Demo at https://l3dlp.com/uptime


## Goals
* Pulls a live public facing dashboard of your overall Uptime Robot stats using their free API.
* Currently shows: last 24 hours, 7 days, 30 days, all time.


## How to use?
* Clone this project
```bash
git clone https://github.com/l3dlp/PHP-UptimeRobot-Dashboard.git uptime
cd uptime/
```
* Add your API key in lib/config.php file
* Change PNG and CSS in gfx/ folder
* That's it!

## Prerequisites
* Must be running PHP >= 5.4

## History
* I needed to show UptimeRobot.com API data in a nice way, without dependencies.
* Forked a project shared by Adam Matthews https://github.com/adammatthews/PHP-UptimeRobot-Dashboard
* Adding missing config.php file, remove all deps, made some CSS improvements and made it ready-to-use

## License
MIT License
