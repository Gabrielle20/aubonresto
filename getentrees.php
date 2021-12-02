<?php

define("ROOT", __DIR__);
include_once "./App/Article.php";


$data = new Article();
$articles = $data->getArticles();

include ROOT."/Templates/Articles/entrees.php";