<?php

namespace Choowx\Satori;

use Spatie\TemporaryDirectory\TemporaryDirectory;

class FontCollection
{
    protected array $collection = [];

    public function push(Font $font): void
    {
        $this->collection[] = $font;
    }

    public function toOptions(): array
    {
        return array_map(
            fn (Font $font) => [
                'name' => $font->name,
                'path' => $font->path,
                'weight' => $font->weight,
                'style' => $font->style,
            ], $this->collection
        );
    }
}
