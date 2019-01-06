
<a href="https://laravel.com"><img src="https://onecentlin.gallerycdn.vsassets.io/extensions/onecentlin/laravel-extension-pack/0.4.0/1534522609664/Microsoft.VisualStudio.Services.Icons.Default"  width="64" height="64"/></a>
<a href="https://nuxtjs.org/"><img src="https://storage.googleapis.com/pwa-directory.appspot.com/64.png"  width="64" height="64"/></a>
<a href="https://bulma.io/"><img src="https://api.compargram.com/media/__sized__/images/2018/7/25/0bd7624cc7a94463be73f4bac71cc840-crop-c0-5__0-5-400x400.png" width="64" height="64" /></a>
<a href="https://github.com/acidjazz/metapi"><img src="https://github.com/acidjazz/metapi/raw/master/logo.png" width="64" height="64" /></a>
<a href="https://materialdesignicons.com"><img src="https://lh3.googleusercontent.com/kellzw4-4Q258D_HdHvcclbu2HEheO1TxauO4lmI5T6tCDnk8pvUfh0W0WpvKiB54g=s64-rw" /></a>
<a href="https://stylus-lang.com"><img src="https://avatars0.githubusercontent.com/u/10009463?s=400&v=4" width="64" height="64" /></a>
<a href="https://github.com/FullHuman/purgecss"><img src="https://github.com/FullHuman/purgecss/raw/master/.assets/logo.png" width="64" height="64" /></a>
<a href="https://tailwindcss.com"><img src="https://pbs.twimg.com/profile_images/895274026783866881/E1G1nNb0_400x400.jpg" width="64" height="64" /></a>

## boilerplate experiment 

### what is included

* [NUXT](https://nuxtjs.org) for our SPA front-end
  * [@nuxtjs/axios](https://github.com/nuxt-community/axios-module) to communicate with our API
  * [@nuxtjs/proxy](https://github.com/nuxt-community/proxy-module) sending `/api` to Laravel
  * [nuxt-purgecss](https://github.com/Developmint/nuxt-purgecss) Drop superflous CSS!

* [Laravel](https://laravel.com) - for our API
  * [metapi](https://github.com/acidjazz/metapi) - API helpers and utilities
  * [debugbar](https://github.com/barryvdh/laravel-debugbar) - awesome debugbar for our API


### installation

* clone from github
* run `yarn` and `composer install` to install all of your deps
* copy .env.example to .env and configure it how you'd prefer
* running `yarn bulma` will compile bulma to `resources/static/css/bublma.css`
  * i do this to speed up reactivity and compilation time
* running `yarn mdi` will copy all the fonts and css to `resources/static/` allowing you to use MDI with bulma/etc
* run `yarn dev` in one terminal for our nuxt dev setup
* run `./artisan serve` in another terminal for our laravel API
