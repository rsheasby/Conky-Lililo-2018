# Conky lililo 2018

## Disclaimer:

I did not create this from scratch. It's a modified version of iceman358's "Conky lililo", which you can find [here](https://www.deviantart.com/iceman358/art/Conky-lililo-356227018). His hasn't been updated in years, so I remade it, keeping the original look and feel but fixing the weather and other minor glitches.

## Installation:

### Prerequisites:

* Font: Arial Black
* Font: OpenLogos (Remix recommended. Original has old icons)
* Font: StyleBats
* Font: PizzaDude Bullets
* Font: DejaVu Sans
* PHP
* CURL
* Conky (Duh)

To install the fonts, simply find, download, and copy the font files into `~/.fonts/` or use your distro's package manager.
 
### Install:

Just clone this repo into ~/.weather:
`git clone https://gitlab.com/rsheasby/conky-lililo-2018.git ~/.weather`

### Things you **NEED** to configure:

* Home coordinates: `darksky.php:80`
* Dark Sky API Key: `darksky.php:83`
* Primary network interface: `conkyrc:103 and conkyrc:111-114` (replace `<net-interface>` with your interface such as `wlan0`)
	
### Things you *probably* want to configure:

* Update interval: `conkyrc:12`
* CPU update averaging: `conkyrc:74`
* Network update averaging: `conkyrc:78`
* Text color: `conkyrc:50 and conkyrc:53`
* Alignment: `conkyrc:56-59 and conkyrc:63-64`
* Kernel icon: `conkyrc:92` (change OpenLogos character)
* Time/Date format: `conkyrc:100-101`
* Temperature units: `darksky.php:86 and conkyrc:86` (units in `darksky.php` should be "us" or "si", units in `conkyrc` should be "celsius" or "fahrenheit")

### Autostart:

See [here](https://wiki.archlinux.org/index.php/autostarting) for a full guide on autostarting, but the basic idea is just to run `conky -q -d -c ~/.weather/conkyrc` on startup. It's a good idea to run the darksky.php script first too so that the weather information will already be up-to-date when conky starts. My startup command looks like this: `bash -c "~/.weather/darksky.php > ~/.weather/weather; conky -q -d -c ~/.weather/conkyrc"`

## Licensing?

This project is licensed under the MIT license. This means you can do whatever you want with the software including modify, share, sell, etc... so long as you keep the copyright notice so that I still get some credit for the work.
