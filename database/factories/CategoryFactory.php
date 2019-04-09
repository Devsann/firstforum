<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
  $word = $faker->word;
    return [
        'catName' => $word,
        'catSlug' => str_slug($word)
    ];
});
