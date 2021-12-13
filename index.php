<?php
include('simple_html_dom.php');

$url = $argv[1];

// Checks if url valid
function valid_URL($url)
{
    return preg_match('%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu', $url);
}

if (valid_URL($url)) {
    echo "Getting Title:" . "\n";
    $html = file_get_html($url);
    echo $html->find('title', 0)->plaintext . "\n";
} else {
    echo "Provide url as argument";
}
