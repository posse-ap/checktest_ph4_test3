<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CreateQiitaArticlesInterface
{
    public function execute(Collection $articles_data): void;
}
