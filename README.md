# Maintenance page

Simple HTML maintenance page to display when taking a site offline during maintenance (e.g. major launch).

Requires PHP 5.4+

## Usage
To point a website at the maintenance page it is recommended to point the document root at the `maintenance` folder. 

This will cause all requests to return the `index.php` page with a 503 temporarily unavailable message, with the exception of `robots.txt` file which Google recommends returns a 200 status during maintenance.

## Setup
Copy the folder `maintenance` to your project root folder, ideally outside of the document root. 

Customise the `index.php` file to create your maintenance page. This page should be static HTML and standalone so it does not require external resources to load (since all requests for the current site are sent to this `index.php` page during maintenance. This means any images must be embedded within the page. Examples on how to implement images appears below. 

We save this as a PHP file so we can easily control the response headers, see the example code:

```php
<?php
// Respond with 503 Unavailable status code
http_response_code(503);

// Advise client to try again after 30 minutes (in secs)
header('Retry-After: 1800');

header('Content-Type: text/html; charset=utf-8');
?>
```

Customise the `robots.txt` file so it matches the contents of your live site.

## Embedding images

The following techniques allow you to easily add embedded images into the maintenance page. Both SVG and base64 examples 
appear in the sample `index.php` file, make sure you edit this for your own requirements.

### SVG 

SVG images are preferred since they are vector images and scale. Save the SVG HTML to `logo.svg` and replace `Studio 24` 
with the name of the website in the following code sample:

```html
<h1>
    <span class="hidden">Studio 24</span>
    <span class="logo">
        <?php echo file_get_contents("logo.svg") ?>
    </span>
</h1>
```

Also see inline SVG images at https://css-tricks.com/using-svg/

### Base64 encoded 

To create a base64 encoded image use this [online convertor tool](https://websemantics.uk/tools/image-to-data-uri-converter/). 
Save the HTML image tag to `logo.base64.html` and replace `Studio 24` with the name of the website in the following code sample:

```html
<h1>
    <span class="hidden">Studio 24</span>
    <span class="logo">
        <?php echo file_get_contents("logo.base64.html") ?>
    </span>
</h1>
```

Also see https://css-tricks.com/data-uris/

### HTTP headers

It's important to return a 503 Temporarily Unavailable header to ensure search engines such as Google do not update their 
index with this maintenance page. 

It is recommended to also return a Retry-After header which advises when a client should try again. We've put 30 minutes 
as an example, edit this to your own preference (the value is in seconds).

You can specify an exact date and time to retry using the following format (this must be in GMT), though we recommend 
sticking to a length of time in seconds.

```
$retry = new DateTime('2017-04-01 13:00');
header('Retry-After: ' . $retry->format('D, d M Y H:i:s') . ' GMT');
```

Also see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Retry-After 

## Further reading

* https://developers.google.com/search/docs/crawling-indexing/pause-online-business#best-practices-disabling-site
* https://yoast.com/http-503-site-maintenance-seo/

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- [Simon R Jones](https://github.com/simonrjones)
