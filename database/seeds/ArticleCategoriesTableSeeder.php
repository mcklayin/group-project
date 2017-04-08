<?php


class ArticleCategoryTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(App\ArticleCategory::class, 2)->create();
    }
}
