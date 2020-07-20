<?php

return [
    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Post\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => 'feed',

            'title' => 'Christoph Rumpel Blog Feed',
            'description' => 'My name is Christoph, and I\'m a web developer, teacher, and content creator from Austria. Welcome to my site, where I share my coding and business experiences with you. Let\'s have a great time together ✌️',
            'language' => 'en-US',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::atom',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],
    ],
];
