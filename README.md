SHARAN Theme
============
This is a wordpress theme for the SHARAN website. It contains only the theme code, and must be added to the themes folder of a wordpress install and activated as a theme. Built and tested on wordpress 3.9.2. The theme is based partially on the [roots starter theme](http://roots.io/), and uses the [roots wrapper](http://roots.io/an-introduction-to-the-roots-theme-wrapper/) for templates.

Requirements
------------
[Compass](http://compass-style.org/) is required to compile the stylesheets.

Asset caching
-------------
After any update to the javascript or CSS, please update the theme version. This is located in `/style.css` (**not** `/assets/css/style.css`). If the version is not updated old cached files might load on client browsers. This is because the version is added as a query string to the files and used as a cachebuster.

CSS
---
[SASS](http://sass-lang.com/) is used as a preprocessor for CSS. Do not modify the `/asets/css` directory, this is handled by compass. Make any changes to the files in `/assets/scss`. Run `compass watch` in the theme root path to automatically compile SASS as changes are made. The compass configuration file is at `/config.rb/`.

Theme Setup
-----------
On setting up the theme, visit the permalinks page to refresh rewrite settings. Registration pages will only work if this is done.

Custom fields
-------------
Custom fields for pages and custom post types are implemented using the [advanced custom fields](http://www.advancedcustomfields.com/) plugin. ACF add-ons have been bought and may not be used for any other projects unless a separate license is used.

Font icons
----------
[Fontello](http://fontello.com/) is used to generate font icons. The font files and the fontello config file (`config.json`) are located in `/assets/icons`. If changes need to be made to the icons, import the `config.json` file on the fontello site, make changes, and download the new package into the `/assets/icons` folder. The [update-fontello](https://github.com/rahul-sekhar/update-fontello) script can be used to quickly update the files from that zip package. It is present in `/util/update-fontello` as a git submodule. It will automatically update the scss and font files. For instructions look at its readme. The script requires ruby to run.