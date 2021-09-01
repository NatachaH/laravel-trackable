# Installation

Install the package via composer:

```
composer require nh/trackable
```

Publish the translation and the model for the trackable:

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
- saved
- changed

You can retrieve the tracks (order by date and id) of a model:

```
$model->tracks;
```

Or you can retrieve the most recent track

```
$model->latestTrack;
```

## Model

You can retrieve multiple information per track:
*You can customize the translations, colors and icons via the trackable config file*

```
$track->event_name;       // The translated name of the event
$track->event_color;      // The color of the event
$track->event_icon;       // The icon of the event
$track->model;            // The clean model name
$track->model_name;       // The translated model name
$track->relation_model;   // The clean relation model name
$track->relation_name;    // The translated relation model name
$track->relation_icon;    // The icon of the relation model
$track->username;         // The username
$track->time;             // The formated time
$track->formated // Return 'Updated <b>3m ago</b> by <b>Natacha</b>'
```

## Add a track

You can add a custom track for a model:

```
$model->addTrack('my-event', $relationModel, $numberRelationModelAffected, 'My comment')
```


## Event listener

You can track some event by using the listener **AddTrack**.

Add this lines to your property **$listen** in your  **App\Providers\EventServiceProvider.php** :

Your event should return:
- $event->name as the name of the event (exemple: created)
- $event->model as the model who is tracked)
- $event->relation as the model relation (exemple: App\Models\Role)
- $event->number as the number of relation affected by the event

```
MyCustomEvent::class => [
    \Nh\Trackable\Listeners\AddTrack::class
]
```
