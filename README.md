Bolt CMS ⚡ HTML to AMP HTML
======================

This is a Bolt CMS extension which converts blocks of regular HTML to AMP compliant HTML using a Twig filter. This project is made possible thanks to the Lullabot PHP AMP Library. 

## Installation
TODO

### Dependancies
You may need to install the Lullaobt AMP Library inside the project root compose.json file in order for this extension to access it, simply run the following:

```
```

## Usage
In your Twig template all you need to is add the `amp` filter, for example `{{ record.body|amp }}`.

If the filter finds any form of rich media content such as a YouTube video or image it will automatically convert it. 

```
<div><img alt="This is an image" src="/files/1461.png"></div>
```

Will become the following:

```
<p><amp-img alt="" src="/files/1461.png" width="567" height="500" layout="responsive"></amp-img></p>
```

### PHP Built In Server
* The PHP built-in server has issues obtaining a proper response from locally stored images. If you run into this issue I suggest updating your development enviroment to Docker.
* For additional caveats I'd suggest checking out the README in the Lullabot AMP Library repo as they apply to this extension too.

## Configuration
Inside the Bolt generated `amphtml.jamesives.yml` file you'll find the configuration file for this extension.

TODO: Add configuration