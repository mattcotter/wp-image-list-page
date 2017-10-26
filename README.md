# Wordpress Image List Page
## Tested on  Wordpress version 4.8.2
This is a quick and simple hack I created to output a list of every page with an attachment that has 'medium' sized images. Alternatively, I could also list by mime-type.

Medium sized images can only have a max height/width of 300px. Using Wordpress's ``` get_the_post_thumbnail_url ``` WP function and PHP's  ```php getimagesize() ``` function, I could find every page that had a featured image that **didn't** have a resolution of 300px by 300px.

## Use
1. Clone the repo to your theme directory: ``` git clone https://github.com/mattcotter/wp-image-list-page ```
2. Create your page in Wordpress, ie "Image Test"
3. Rename the file to match your page's slug, ie "page-image-test.php"

## Modifying
You can modify the page to look for specific mime-types (jpg/png/pdf) or different sizes of the featured image

If I was going to look for mime-type, I would just use ```php if (($mime == 'image/pdf') && ($open)) { ... } ``` in my statement

For standard images like .png or .jpg, Wordpress also has various sizes of your media saved. You can remove ```'medium'``` (remember to remove the comma and modify your if statement, as well) from ``` $url ``` to list your original image, disregarding resolution.

Find more info on Thumbnails here: https://codex.wordpress.org/Post_Thumbnails

Find more info on getimagesize() here: http://php.net/manual/en/function.getimagesize.php


