<?php

namespace Src\controller;

use Src\model\NewsService;
use Src\router\Request;
use Src\router\Response;

class NewsController
{

    /**
     * Gets all news from the database
     *
     * @param Request $req
     * @param Response $res
     * @return void
     */
    public static function getNews(Request $req, Response $res)
    {
        $news = new NewsService();
        $data = $news->getAllNews();

        $res->toJSON([
            'data' => $data,
        ]);

    }

    /**
     * TO-DO
     * - reimplement responses with code and sutff
     */
    public static function addNews(Request $req, Response $res)
    {
        $news = new NewsService();
        $data = $news->addNews($req->getJson());

        $res->toJSON([
            'data' => $data,
        ]);
    }

    public static function getNewsDetail(Request $req, Response $res)
    {
        $id = $req->params[0];
        $news = new NewsService();
        $data = $news->getNewsDetail($id);

        $res->toJSON([
            'data' => $data,
        ]);
    }

    public static function editNew(Request $req, Response $res)
    {
        $id = $req->params[0];
        $news = new NewsService();
        $data = $news->updateNew($id, $req->getJson());

        $res->toJson([
            'data' => $data,
        ]);
    }

    public static function deleteNew(Request $req, Response $res)
    {
        $id = $req->params[0];
        $news = new NewsService();
        $data = $news->deleteNew($id);

        $res->toJson([
            'data' => $data,
        ]);
    }

}
