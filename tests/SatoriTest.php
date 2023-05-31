<?php

use Choowx\Satori\Font;
use Choowx\Satori\Satori;

it('can convert to svg', function () {
    $svg = Satori::html('<div style="color: black">hello, world</div>')->convert();

    expect($svg)
        ->toStartWith('<svg width="1200" height="630" viewBox="0 0 1200 630" xmlns="http://www.w3.org/2000/svg">')
        ->toEndWith('</svg>');
});

it('can convert to svg in specified width', function () {
    $svg = Satori::html('<div style="color: black">hello, world</div>')
        ->width(600)
        ->convert();

    expect($svg)->toContain('width="600"');
});

it('can convert to svg in specified height', function () {
    $svg = Satori::html('<div style="color: black">hello, world</div>')
        ->height(500)
        ->convert();

    expect($svg)->toContain('height="500"');
});

it('can convert to svg with custom font', function () {
    $svg = Satori::html('<div style="color: black">hello, world</div>')
        ->withFonts([Font::path(__DIR__.'/fonts/Roboto-Regular.ttf')])
        ->convert();

    expect($svg)
        ->toStartWith('<svg width="1200" height="630" viewBox="0 0 1200 630" xmlns="http://www.w3.org/2000/svg">')
        ->toEndWith('</svg>');
});
