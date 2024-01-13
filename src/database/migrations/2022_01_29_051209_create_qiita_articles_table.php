<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQiitaArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qiita_articles', function (Blueprint $table) {
            $table->id();
            $table->string("title")->comment("Qiita記事のタイトル");
            $table->string("url")->comment("Qiita記事のurl");
            $table->string("article_id")->comment("Qiita上の記事id");
            $table->unique('article_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qiita_articles');
    }
}
