<?php

use Choowx\Satori\Font;

it('can set font\'s options', function () {
    $font = Font::path('path/to/custom-font.ttf');

    expect($font)
        ->path->toBe('path/to/custom-font.ttf')
        ->name->toBe('custom-font')
        ->weight->toBeNull()
        ->style->toBeNull();

    $font->name('Roboto')
        ->weight(400)
        ->style('regular');

    expect($font)
        ->name->toBe('Roboto')
        ->weight->toBe(400)
        ->style->toBe('regular');
});
