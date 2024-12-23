<?php

namespace Tests\Feature\Api\V1\Qiita\Articles;

use App\Services\GetQiitaArticles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Mockery;


class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    # TODO 問3
    public function test_get_request()
    {
        // ここを実装してください
        // 1. qiita_articles テーブルのレコードが0件であること
        // 2. http://localhost/api/api/v1/qiita/articles にリクエストを送信する
        // 3. レスポンスステータスが期待通り（201）であること
        // 4. レスポンスが期待通りであること
        // 5. qiita_articles テーブルのレコードに2件登録されていること
    }

    public function test_return_value_when_request_success()
    {
        $mock = Mockery::mock(GetQiitaArticles::class);
        $mock->shouldReceive('execute')
            ->once()
            ->andReturn(
                [
                    0 => ["id" => 1, "title" => "qiita title 1", "url" => "qiita url 1"],
                    1 => ["id" => 2, "title" => "qiita title 2", "url" => "qiita url 2"],
                ]
            );
        $this->instance(GetQiitaArticles::class, $mock);
        $response = $this->get('/api/api/v1/qiita/articles');
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertExactJson([
            'message' => 'create success',
            'status' => Response::HTTP_CREATED,
        ]);
    }

    # TODO 問4 テスト実装部分
    public function test_return_value_when_request_failed()
    {
        // 1. `$this->getQiitaArticles->execute()`の処理で例外を吐くモックを作成する
        // 2. http://localhost/api/api/v1/qiita/articles にリクエストを送信する
        // 3. レスポンスステータスが期待通り（201）であること
        // 4. レスポンスが期待通りであること
    }
}
