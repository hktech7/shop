<?php

require_once 'ShopStyle/API.php';
include 'ShopStyle/Query/IQuery.php';
include 'ShopStyle/Query/BasicQuery.php';

function get_shop_categories() {
    $shop = new API('uid761-40030819-76');
    $categories = $shop->getCategories();
    $meta_name = $categories->metadata->root->name;
    $meta_description = $categories->metadata->root->fullName;
    $meta_keyword = $categories->metadata->root->fullName;


    $limit = 50;
    $offset = 0;
    $page = 1;
    if (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) {
        $page = $_REQUEST['page']; //- 1;
        $offset = $page * $limit;
    }

    $product_arr = array('fts' => $cat);
    $products = $shop->getProducts($limit, $offset, $product_arr)->products;

    $product_meta = $shop->getProducts()->metadata;
    $limit = $product_meta->limit;
    $offset = $product_meta->offset;
    $total = $product_meta->total;

    $total_pages = ceil($total / $limit);

    $response = array(
        'total_pages' => $total_pages,
        'total' => $total,
        'meta_name' => $meta_name,
        'meta_description' => $meta_description,
        'meta_keyword' => $meta_keyword,
        'categories' => $categories
    );
    
    return $response;
}
