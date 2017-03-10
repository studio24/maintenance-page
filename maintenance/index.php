<?php
// Respond with 503 Unavailable status code
http_response_code(503);

// Advise client to try again after 30 minutes (in secs)
header('Retry-After: 1800');

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>We're undergoing essential maintenance and will be back soon!</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <style>
        body {
            background: #fff;
            color: #222;
            font-family: arial, sans-serif;
            font-size: 1em;
            line-height: 1.35;
            margin: 0;
            padding: 0;
        }

        a {
            color: #2266dd;
        }

        /* default spacing for small screen */
        .container {
            margin: 0 auto;
            max-width: 640px;
            padding: 2em;
            text-align: center;
        }

        .container h1 {
            margin: 1em 0;
            padding: 0;
        }

        .container h2 {

        }

        .container p {
            margin: 1.4em 0;
        }

        .hidden {
            height: 1px;
            left: -10000px;
            overflow: hidden;
            position: absolute;
            top: auto;
            width: 1px;
        }

        .logo {
            width: 108px;
            max-width: 100%;
        }

        /* spacing for larger screens */
        @media screen and (min-width: 500px) {
            .container {
                padding-top: 4em;
            }
        }
        @media screen and (min-width: 800px) {
            .container {
                max-width: 720px;
                padding-top: 6em;
            }
        }
    </style>
    <div class="container">

        <!-- SVG logo -->
        <h1>
            <span class="hidden">Studio 24</span>
            <span class="logo">
                <?php echo file_get_contents("logo.svg") ?>
            </span>
        </h1>

        <!-- base64 encoded image -->
        <h1>
            <span class="hidden">Studio 24</span>
            <span class="logo">
                <?php echo file_get_contents("logo.base64.html") ?>
            </span>
        </h1>

        <h2>Our website is currently undergoing essential maintenance and will be back online shortly.</h2>

        <p>If you have any questions please contact our customer services team via email at
            <a href="mailto:hello@studio24.net">hello@studio24.net</a></p>

    </div>
    </body>
</html>
