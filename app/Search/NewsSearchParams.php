<?php

namespace App\Search;

class NewsSearchParams
{
    private ?string $title = null;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function hasTitle(): bool
    {
        return $this->title !== null;
    }
}
