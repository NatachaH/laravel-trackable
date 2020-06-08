# Installation

Install the package via composer:

```
composer require nh/trackable
```

Publish the database and the translation for the trackable:

```
php artisan vendor:publish --tag=trackable
```

To make a model trackable, add the **Trackable** trait to your model:
*To retrieve the tracks of your model => $post->tracks*
*To check if of your model has any tracks => $post->hasTracks()*

```
use Nh\Trackable\Traits\Trackable;

use Trackable;
```

The events available for the model are:
- created
- updated
- deleted
- soft-deleted
- restored
- force-deleted
- saved (For relationship update)

## Customize

You can define the field to use as description:
*By default the Track description will be the model column title, or name. If none of these columns exists, it will be set as NULL.*

```
/**
 * The trackable field to use in description.
 * @var string
 */
protected $trackable = 'type';    
```

You can also add a custome track for a model:

```
$model->addTrack('name','description');
```
