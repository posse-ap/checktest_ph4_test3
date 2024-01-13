<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\QiitaArticle;
use App\Repositories\Interfaces\CreateQiitaArticlesInterface;

class CreateQiitaArticles implements CreateQiitaArticlesInterface
{
    /**
     *
     * Qiita記事をmapで回し、必要なデータにだけ整形しupsertする
     *
     * @param Collection $articles_data Qiitaの記事をCollection型にキャストしたもの
     * @return void
     */
    public function execute(Collection $articles_data): void
    {
        # TODO 問7 3件ほど登録するように$articles_dataを用意し、
        # upsertした結果、3件だけDBに登録されていることをUnitテストで担保してください
        # また、$articles_dataが空のCollectionの時、1件も登録されていないことをUnitテストで担保してください
        QiitaArticle::upsert($articles_data->map(function($article) {
            return [
                "title" => $article["title"],
                "url" => $article["url"],
                "article_id" => $article["id"],
            ];
        })->toArray(), ['article_id', 'title', 'url']);
    }
}
