# Bolt CMS ⚡ HTML to AMP HTML Filter

[Bolt CMS](https://bolt.cm/) extension which converts blocks of regular HTML to [AMP compliant HTML](https://www.ampproject.org/) using a Twig filter. This project is made possible thanks to the [Lullabot PHP AMP Library](https://github.com/Lullabot/amp-library). 

## Installation
TODO

#### Dependancies
You may need to install the Lullabot AMP PHP library inside your Bolt CMS root in order for this extension to work. This can be achieved by running the following command inside the root of your Bolt project.

```
$ composer require lullabot/amp:"^1.0.0"
```

## Usage
In your Twig templates all you need to is add the `amp` filter, for example `{{ record.body|amp }}`. If the filter finds any form of rich media content such as a YouTube embed or image it will automatically convert it to the AMP equivalent.

```
<div>
  <img alt="This is an image" src="/files/1461.png">
</div>
```

Will become the following:

```
<div>
  <amp-img alt="" src="/files/1461.png" width="567" height="500" layout="responsive"></amp-img>
</div>
```

#### Local Development
The built in PHP server configuration that is packaged with Bolt CMS may prevent this extension from working properly when it encounters images, this is due to how it handles the requests. If you encounter these issues I'd suggest using the Bolt CMS Docker container instead for local development.

## Configuration
Inside the generated configuration file you'll find some options which can be used to customize this extension.

| Option | Description | Type |
| ------------- | ------------- | ------------- |
| `show_action_log`  |  Prints on the page what the AMP library converted and why. | boolean (Defaults to false) |
