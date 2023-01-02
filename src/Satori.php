<?php

namespace Choowx\Satori;

use Choowx\Satori\Exceptions\CouldNotRunSatori;
use Choowx\Satori\Support\Arr;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Process;

class Satori
{
    protected string $html;

    protected int $width = 1200;

    protected int $height = 630;

    protected FontCollection $fonts;

    protected TemporaryDirectory $temporaryHtmlDirectory;

    public function __construct(string $html)
    {
        $this->html = $html;
        $this->fonts = new FontCollection;
    }

    public static function html(string $html): self
    {
        return new self(html: $html);
    }

    public function width(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function height(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function withFonts(array $fonts): self
    {
        foreach ($fonts as $font) {
            $this->fonts->push($font);
        }

        return $this;
    }

    public function convert(): string
    {
        $arguments = $this->satoriScriptArguments();

        $command = [
            (new ExecutableFinder)->find('node', 'node', [
                '/usr/local/bin',
                '/opt/homebrew/bin',
            ]),
            'satori.js',
            ...$arguments,
        ];

        $process = new Process(
            command: $command,
            cwd: __DIR__.'/../bin',
            timeout: (60 * 1000) - 700,
        );

        $process->run();

        $result = $process->getOutput();

        $this->temporaryHtmlDirectory->delete();

        if (! is_string($result)) {
            throw CouldNotRunSatori::make($process->getErrorOutput());
        }

        return $result;
    }

    protected function satoriScriptArguments(string $key = null): mixed
    {
        return Arr::get([
            'htmlFilePath' => $this->createTemporaryHtmlFile(),
            'width' => $this->width,
            'height' => $this->height,
            'fonts' => json_encode($this->fonts->toOptions()),
        ], $key);
    }

    protected function createTemporaryHtmlFile(): string
    {
        $this->temporaryHtmlDirectory = (new TemporaryDirectory)->create();

        file_put_contents($temporaryHtmlFile = $this->temporaryHtmlDirectory->path('index.html'), $this->html);

        return $temporaryHtmlFile;
    }
}
