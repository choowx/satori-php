<?php

namespace Choowx\Satori;

class Font
{
    public string $path;

    public ?string $name = null;

    public ?int $weight = null;

    public ?string $style = null;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public static function path(string $path): self
    {
        return (new static(path: $path))->name(pathinfo($path, PATHINFO_FILENAME));
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function weight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function style(string $style): self
    {
        $this->style = $style;

        return $this;
    }
}
