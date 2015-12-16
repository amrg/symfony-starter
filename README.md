mimopo/symfony-starter
======================

Symfony 3 starter project.


Requirements:
------------
- Node >= 0.12.x
- npm >= 2.1.5
- php >= 5.4.x


Quick Start:
------------
- Run gulp & git in your physical machine
- Run composer and symfony command in the Vagrant box

0. Dependencies:
    1. Install [nfsd](https://help.ubuntu.com/14.04/serverguide/network-file-system.html)
    1. Install [Vagrant](https://www.vagrantup.com/)
    2. Install [Node](https://nodejs.org) 
    3. Upgrade npm with `npm install -g npm@latest`
    4. Install Gulp and Bower globally with `npm install -g gulp bower`
1. Vagrant:
    1. Starts and provisions the vagrant environment: `vagrant up`
    2. Connect to vagrant box: `vagrant ssh`
    3. Go to the project folder: `cd /var/www/project` (Vagrant Box)
    4. Install Composer dependencies: `composer install` (Vagrant Box)
2. Gulp:
    1. Install Node dependencies: `npm install`
    2. Install Bower dependencies: `bower install`
    3. Build assets: `gulp`
    4. Watch assets changes and starts BrowserSync: `gulp watch`
3. Browse [http://localhost:3000] (BrowserSync)


Assets:
-------
- Install Bower packages with `bower install --save package-name`
- Store assets in app/Resources/assets:
    - fonts: These files will be copied to `/web/assets/fonts`
    - images: These files will be optimized and copied to `/web/assets/images`
    - scripts: javascripts files. These files must be declared in [/app/Resources/assets/manifest.json](app/Resources/assets/manifest.json)
    - sytles: scss & css files. These files must be declared in [/app/Resources/assets/manifest.json](app/Resources/assets/manifest.json)
- Declare your scripts and styles in [/app/Resources/assets/manifest.json](app/Resources/assets/manifest.json). (see [austinpray/asset-builder](https://github.com/austinpray/asset-builder)) 
- Run Gulp Tasks:
    - `gulp` — Compile and optimize the files in your assets directory
    - `gulp watch` — Compile assets when file changes are made and starts BrowserSync
    - `gulp --production` — Compile assets for production (versioned, no source maps)
- Link your assets with the asset_version twig filter (example: `asset('/assets/styles/main.css'|asset_version)`)
    - When you use `gulp --production` scripts & styles will be versioned with [gulp-rev](https://github.com/sindresorhus/gulp-rev). 
    - The asset_version twig filter reads the `/var/rev-manifest.json` and returs the real url
    - If there is no `/var/rev-manifest.json` file it returns the url as is


Features:
---------
- [Vagrant](https://www.vagrantup.com/) BOX + [Puphpet](https://puphpet.com/) (see [config.yaml](puphpet/config.yaml))
- Vagrant Performance improvements:
    - NFS shared folder
    - kernel.logs_dir & kernel.cache_dir
    - Use ACLs to prevent permissions problems (see [00-sf-dir.sh](puphpet/files/startup-always/00-sf-dir.sh))
- Translator service enabled by default
- Assets managed with [Bower](http://bower.io/) & [Gulp](http://gulpjs.com/) (see [gulpfile.js](gulpfile.js))
    - Setup based on [Sage Roots](https://github.com/roots/sage/blob/master/gulpfile.js)
    - [asset-builder](https://github.com/austinpray/asset-builder) (see [manifest.json](app/Resources/assets/manifest.json))
    - [Wiredep](https://github.com/taptapship/wiredep)
    - [BrowserSync](http://www.browsersync.io/)
- [Bootstrap 4](http://getbootstrap.com/) and [FontAwesome](https://fortawesome.github.io/Font-Awesome/) by default (see [bower.json](bower.json))


ToDo:
-----
- Vagrant:
    - Enable ACL from vagrant provision - [https://gist.github.com/frastel/6775604]
    - Change cache & log directories
- Move the MimopoGulpBundle out of the project.
- Improve doc