<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasColumn('tags', 'ziven_background_url')) {
            $schema->table('tags', function (Blueprint $table) {
                $table->string('ziven_background_url',200)->nullable();
            });

            $schema->table('tags', function (Blueprint $table) {
                $table->boolean('ziven_background_hide_name')->default(0);
            });
        }
    },
    'down' => function (Builder $schema) {
        $schema->table('tags', function (Blueprint $table) {
            $table->dropColumn('ziven_background_url');
            $table->dropColumn('ziven_background_hide_name');
        });
    },
];
