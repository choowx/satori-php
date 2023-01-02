<?php

use Choowx\Satori\Font;
use Choowx\Satori\FontCollection;

it('can push fonts and transform to options', function () {
    $fontCollection = new FontCollection;

    expect($fontCollection)->toOptions()->toBeArray()->toBeEmpty();

    $fontCollection->push(Font::path('path/to/custom-font.ttf'));

    expect($fontCollection)->toOptions()->toBeArray()->toHaveCount(1);
});
