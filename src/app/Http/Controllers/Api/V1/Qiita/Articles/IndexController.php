<?php

namespace App\Http\Controllers\Api\V1\Qiita\Articles;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\GetQiitaArticlesInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    private GetQiitaArticlesInterface $getQiitaArticles;

    public function __construct(GetQiitaArticlesInterface $getQiitaArticles)
    {
        $this->getQiitaArticles = $getQiitaArticles;
    }


    /**
     * [GET]Qiita記事を取得しDBに保存する
     *
     * Qiita API記事をAPIで取得し、それをDBに保村する
     * 保存して成功したら成功したことをレスポンスで返す
     * Service層以下で例外が発生した場合、エラー内容を返す
     *
     * @return JsonResponse 記事取得&DB保存の結果
     */
    public function __invoke(): JsonResponse
    {
        try {
            $this->getQiitaArticles->execute();

            return response()->json([
                'message' => 'create success',
                'status' => Response::HTTP_CREATED,
            ], Response::HTTP_CREATED);
        } catch (\Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
                'status' => $error->getCode(),
            ], $error->getCode());
        }
    }
}
