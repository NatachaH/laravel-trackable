<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Teanslations
  |--------------------------------------------------------------------------
  |
  | Here you may specify the translations path to use for events, models and relations
  */

  'translations' => [
    'events'    => 'trackable.event',
    'models'    => '',
    'relations' => ''
  ],

  /*
  |--------------------------------------------------------------------------
  | Event
  |--------------------------------------------------------------------------
  |
  | Here you may specify the color and icon for each events
  */

  'events' => [
    'default' => [
      'icon' => 'rocket',
      'color' => 'primary'
    ],
    'created' => [
      'icon' => 'plus',
      'color' => 'success'
    ],
    'updated' => [
      'icon' => 'pencil',
      'color' => 'info'
    ],
    'saved' => [
      'icon' => 'pencil',
      'color' => 'info'
    ],
    'deleted' => [
      'icon' => 'trash',
      'color' => 'danger'
    ],
    'force-deleted' => [
      'icon' => 'trash',
      'color' => 'danger'
    ],
    'soft-deleted' => [
      'icon' => 'trash',
      'color' => 'warning'
    ],
    'restored' => [
      'icon' => 'time-reverse',
      'color' => 'primary'
    ]
  ],

  /*
  |--------------------------------------------------------------------------
  | Relationships
  |--------------------------------------------------------------------------
  |
  | Here you may specify the color and icon for each relation model
  */

  'relations' => [
    'default' => [
      'icon' => 'information'
    ],
    'category' => [
      'icon' => 'tag'
    ],
    'address' => [
      'icon' => 'location'
    ],
    'status' => [
      'icon' => 'flag'
    ],
    'media' => [
      'icon' => 'image'
    ],
    'role' => [
      'icon' => 'key'
    ]
  ]

];
