# Seed

## Installation:

### Install Seed on Raspberry Pi
There are two ways to install seed on a raspberry pi:

1. Download Raspberry Pi SD Image (SD card must be 8GB or greater):
  - https://www.dropbox.com/s/mjveylxftuaum8g/project_seed_rpi.dmg.zip?dl=0

2. Configure Raspberry pi into an wifi access point.
  - This will serve as an local offline server
  - https://learn.adafruit.com/setting-up-a-raspberry-pi-as-a-wifi-access-point/overview

### Install External Storage
Once the seed installation is complete, mount a external hard drive to the raspberry pi for storage:
  https://www.modmypi.com/blog/how-to-mount-an-external-hard-drive-on-the-raspberry-pi-raspian

Finally download nginx, php, and larval as mentioned below.
http://www.ducky-pond.com/posts/2013/Sep/setup-a-web-server-on-rpi/
https://www.digitalocean.com/community/tutorials/how-to-install-laravel-with-nginx-on-an-ubuntu-12-04-lts-vps

***
You must run the following commands in the terminal upon reboot (we'll fix the daemon soon):

```
sudo service hostapd start
sudo service isc-dhcp-server start
```
