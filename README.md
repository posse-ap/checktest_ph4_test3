# チェックテスト(v2.0.0)

## 準備

コマンドをコピーして実行する場合は、`$` は含めないでください

### ソースコードをクローンする
```shell
$ git clone git@github.com:posse-ap/checktest_ph4_test3.git
```

### プロジェクトルートへ移動
```shell
$ cd checktest_ph4_test3
```

### 環境構築
```shell
$ docker compose build --no-cache
$ docker compose up -d
$ docker compose exec app bash
$ composer install
```

http://localhost/ にアクセスするとLaravelの画面が表示されます。


### php artisan系のコマンドを実行したい場合は以下の方法で実行してください
```shell
$ docker compose exec app bash
$ php artisan migrate
```

### コンテナを停止したい場合は以下のコマンドを実施
```shell
$ docker compose stop
```

## 問題

### 問1 外部APIを使ってみる

1. App\Http\Controllers\Api\V1\StarWarsControllerの__invokeを実装する
    - https://swapi.dev/api/films/1 に GET リクエストを送り、レスポンスを受け取る処理を記述してください。また、外部APIにリクエストを送信する処理は [Guzzle](https://readouble.com/laravel/10.x/ja/http-client.html) を利用してください。
2. StarWarsControllerに関するテストを流してみる


**確認方法**

- [ ] テストコマンドを実行して「Tests: 1 passed」という風にテストが通っていれば合格です。

### テストコマンド
```shell
$ php artisan test tests/Feature/Api/V1/StarWarsControllerTest.php
```

### 問2 外部APIを使ってみる(2)

1. App\Services\GetQiitaArticles.phpを確認し、TODOコメント部分を実装してください。
    - base urlはL13行目に定義しているので、文字列連結して使ってください（ex: self::QIITA_BASE_URL . $qiita_url_path）
    - リクエストヘッダーには QiitaAPI の token をセットしてください
    - .envに記述されているQIITA_TOKENを利用してください
2. $statusがddで200になっていることを確認

**確認方法**

- [ ] http://localhost/api/api/v1/qiita/articles にアクセス、画面に「200」と表示で合格です。


### 問3 api/api/v1/qiita/articlesのテストを書こう

tests/Feature/Api/V1/Qiita/Articles/IndexControllerTest.phpをご確認ください
test_get_request内に以下を確認するテストを書いてください

問2の確認が合格している前提の問題になっています

1. qiita_articles テーブルのレコードが0件であること
2. http://localhost/api/api/v1/qiita/articles にリクエストを送信する
3. レスポンスステータスが期待通り（201）であること
4. レスポンスが期待通りであること
5. qiita_articles テーブルのレコードに2件登録されていること

**確認方法**

- [ ] ｢Tests: 1 passed」テストが通っていれば合格です。

```shell
$ php artisan test tests/Feature/Api/V1/Qiita/Articles/IndexControllerTest.php --filter "test_get_request"
```

### 問4 FeatureテストをMockeryを使って書いてみよう

App\Http\Controllers\Api\V1\Qiita\Articles\IndexControllerの `$this->getQiitaArticles->execute()` がエラーを起こした時、statusが期待通りであることをFeatureテストで担保してください。
`test_return_value_when_request_success`のテストコードを参考に`test_return_value_when_request_failed`にMockeryを使いテストを書いてください

1. `$this->getQiitaArticles->execute()`の処理で例外を吐くモックを作成する
2. http://localhost/api/api/v1/qiita/articles にリクエストを送信する
3. レスポンスステータスが期待通り（201）であること
4. レスポンスが期待通りであること


**確認方法**

- [ ] テストが通っていれば合格です。

```shell
$ php artisan test tests/Feature/Api/V1/Qiita/Articles/IndexControllerTest.php --filter "test_return_value_when_request_failed"
```

### 問5 CreateQiitaArticlesのテストを書こう

Tests\Unit\Repositories\CreateQiitaArticlesTest.phpを確認してください

1. qiita_articlesテーブルにレコードが登録されるようにexecuteに適当なデータを入れて、レコードが登録されることを担保してください
2. executeに空の配列(Collection)を入れて、レコードが登録されないことを担保してください

**確認方法**

- [ ] テストが通っていれば合格です。

```shell
$ php artisan test tests/Unit/Repositories/CreateQiitaArticlesTest.php --filter "test_empty_collection_given"
```
- [ ] テストが通っていれば合格です。

```shell
$ php test tests/Unit/Repositories/CreateQiitaArticlesTest.php --filter "test_not_empty_collection_given"
```


author: ハシモト流エンジニアリング家元
