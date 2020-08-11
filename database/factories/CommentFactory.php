<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\Post;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        'post_id' => factory(Post::class)->create()->id
    ];
});
