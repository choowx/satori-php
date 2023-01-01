<?php

namespace Choowx\Satori\Exceptions;

class CouldNotRunSatori extends \Exception
{
    public static function make(string $errorOutput): self
    {
        return new self("Could not run Satori. Error : `{$errorOutput}`");
    }
}
