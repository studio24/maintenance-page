# Maintenance page

Simple HTML maintenance page to display when taking a site offline during maintenance (e.g. major launch).

Requires PHP 5.4+

## Usage
To point a website at the maintenance page it is recommended to point the document root at the `maintenance` folder. 

This will cause all requests to return the `index.php` page with a 503 temporarily unavailable message.

## Setup

Copy the folder `maintenance` to your project root folder, ideally outside of the document root. 

Customise the `index.php` file to create your maintenance page. The only requirement is this page should not load any 
external resources from the same domain, since all requests will be directed to this maintenance page.

This means any images must be embedded within the page. Examples on how to implement images appears below. 

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

* https://yoast.com/http-503-site-maintenance-seo/
* https://webmasters.googleblog.com/2011/01/how-to-deal-with-planned-site-downtime.html

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- [Simon R Jones](https://github.com/simonrjones)
