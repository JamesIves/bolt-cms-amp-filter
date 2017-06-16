# Bolt CMS ⚡ HTML to AMP HTML Filter

[Bolt CMS](https://bolt.cm/) extension which converts blocks of regular HTML to [AMP compliant HTML](https://www.ampproject.org/) using a Twig filter. This project is made possible thanks to the [Lullabot PHP AMP Library](https://github.com/Lullabot/amp-library). 

## Installation
This extension can be installed via the Bolt CMS "Extend" menu in the admin control panel. Simply search for `jamesives/bolt-cms-amp-filter` to install the desired version.

#### Dependancies
You may need to install the Lullabot AMP PHP library inside your Bolt CMS root in order for this extension to work. This can be achieved by running the following command inside the root of your Bolt project.

```
$ composer require lullabot/amp:"^1.0.0"
```

## Usage
In your Twig templates all you need to is add the `amp` filter to the HTML you'd like to convert, for example `{{ record.body|amp }}`. If the filter finds any form of rich media content such as a YouTube embed or image it will automatically convert it to the AMP equivalent.

```
<div>
  <img alt="This is an image" src="/files/1461.png">
</div>
```

Will become the following:

```
<div>
  <amp-img alt="This is an image" src="/files/1461.png" width="567" height="500" layout="responsive"></amp-img>
</div>
```

If you'd like to return the converted AMP HTML so you can check for content within it you can do so by using the `ampraw` filter, for example `{{ record.body|ampraw }}`. This is useful if you want to check if the content contains a certain type of AMP component so you can systematically place the JavaScript for it in the page header.

```
{% set body = record.body|ampraw %}
  {% if 'amp-youtube' in body %}
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>   
  {% endif %}
```

#### Local Development
The built in PHP server configuration that is packaged with Bolt CMS may prevent this extension from working properly when it encounters images, this is due to how it handles the requests. If you encounter these issues I'd suggest using the [Bolt CMS Docker container](https://github.com/rossriley/docker-bolt) instead for local development. Special thanks to [Christian](https://github.com/CristianAThompson) for the help debugging this issue! 

## Configuration
Inside the generated configuration file you'll find some options which can be used to customize this extension.

| Option | Description | Type |
| ------------- | ------------- | ------------- |
| `show_action_log`  |  Prints on the page what the AMP library converted and why. | boolean (Defaults to false) |
