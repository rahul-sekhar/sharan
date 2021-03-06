SHARAN Theme
============
This is a wordpress theme for the SHARAN website. It must be added to a wordpress install and activated as a theme. Built and tested with wordpress 3.9.2. The theme is based partially on the [roots starter theme](http://roots.io/), and uses the [roots wrapper](http://roots.io/an-introduction-to-the-roots-theme-wrapper/) for templates.

Requirements
------------
[Compass](http://compass-style.org/) is required to compile the stylesheets.

Directory Structure
-------------------
- `/assets/` contains styling, javascript and images for the theme.
- `/assets/css` contains compiled CSS files. Do not modify these.
- `/assets/fonts` contains the [cloud typography](http://www.typography.com/) font package.
- `/assets/icons` contains font icons, generated by [fontello](http://fontello.com/).
- `/assets/images` contains any image files used by the theme.
- `/assets/js` contains javascript plugins and scripts.
- `/assets/scss` contains [SASS](http://sass-lang.com/) files
- `/lib` contains PHP libraries and files with theme functions. This is where the core theme functionality is located
- `/templates` contains PHP templates that are included into other templates using the wordpress function `get_template_part`
- `/util/` contains utility scripts, for example to quickly update fontello icons
- `/`, the root directory, contains mainly wordpress template files. Basic knowledge of the [roots wrapper](http://roots.io/an-introduction-to-the-roots-theme-wrapper/) is useful.
- `/style.css` is a placeholder stylesheet with the theme version and author info. It is not used to actually style the theme, but is required by wordpress.
- `/Guardfile` is a configuration file that can be used with [guard-livereload](https://github.com/guard/guard-livereload) to livereload a browser when css files are modified. This is entirely optional, and just makes it quicker to work on styling.

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