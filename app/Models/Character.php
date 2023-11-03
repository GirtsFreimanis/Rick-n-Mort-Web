<?php

declare(strict_types=1);

namespace App\Models;

class Character
{
    private string $name;
    private string $imgUrl;

    public function __construct(
        string $name,
        string $imgUrl
    )
    {
        $this->name = $name;
        $this->imgUrl = $imgUrl;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }
}