<?php 

function getPageLink($page = 1, $total_pages = 1) {
    if ($page < 1) {
        $page = 1;
    }

    if ($page > $total_pages) {
        $page = $total_pages;
    }

    $new_data = array("page" => $page);
    $full_data = array_merge($_GET, $new_data);
    $url = http_build_query($full_data);
    return strtok($_SERVER['REQUEST_URI'], '?') . '?' . $url;
}
?>