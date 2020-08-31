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

You can retrieve the last track of a model:

```
$model->last_track;
```

## Add a track

You can add a custome track for a model:

```
$model->addTrack('event','comment');
```
