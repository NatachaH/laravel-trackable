# Installation

Install the package via composer:

```
composer require nh/trackable
```

Publish the database and the config for the media:

```
php artisan vendor:publish --tag=trackable
```

To make a model trackable, add the **Trackable** trait to your model:
*To retrieve the tracks of your model => $post->tracks*
*To check if of your model has any media => $post->hasMedia()*

```
use Nh\Trackable\Traits\Trackable;

use Trackable;
```
