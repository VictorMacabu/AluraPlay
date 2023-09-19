<?php

declare(strict_types=1);

namespace Alura\Mvc\Entity;

use http\Exception\InvalidArgumentException;

class Video
{
    public readonly string $url;
    public readonly int $id;

    public function __construct(string $url,
                public readonly string $title,
    )
    {
        $this->setUrl($url);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    private function setUrl(string $url): void
    {
        if (filter_var($url,FILTER_VALIDATE_URL) === false){
            throw new InvalidArgumentException();
        }
        $this->url = $url;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}