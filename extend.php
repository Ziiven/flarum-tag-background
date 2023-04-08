<?php

use Flarum\Extend;
use Flarum\Tags\Tag;
use Flarum\Tags\Api\Serializer\TagSerializer;

use Ziven\tagBackground\Controller\TagBackgroundSetImageController;

$extend = [
    (new Extend\Frontend('admin'))->js(__DIR__.'/js/dist/admin.js')->css(__DIR__.'/less/admin.less'),
    (new Extend\Frontend('forum'))->js(__DIR__ . '/js/dist/forum.js')->css(__DIR__.'/less/forum.less'),

    (new Extend\Locales(__DIR__ . '/locale')),

    (new Extend\Model(Tag::class))
        ->cast('ziven_background_url', 'string')
        ->cast('ziven_background_hide_name', 'boolean'),

    (new Extend\ApiSerializer(TagSerializer::class))
        ->attribute('zivenBackgroundURL', function (TagSerializer $serializer, Tag $tag) {
            return $tag->ziven_background_url;
        })
        ->attribute('zivenBackgroundHideName', function (TagSerializer $serializer, Tag $tag) {
            return $tag->ziven_background_hide_name;
        }),

    (new Extend\Routes('api'))
        ->post('/tagBackgroundSetImage', 'tagBackground.update', TagBackgroundSetImageController::class),
];

return $extend;