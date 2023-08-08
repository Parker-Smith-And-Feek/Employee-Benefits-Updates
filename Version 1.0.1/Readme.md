#Update with notes about the new version


##CSS
- universal.css
  - Reducing font size of post a
  - Removing bold from post titles
  
  
##General Notes
- Adding custom-shortcode.php
- Adding template-hr-insight.php
- Going to see if I can create & add shortcodes so that I can make the updating individual pages a little more accessible
   - Individual pages now use shortcode for their respective content
   - The home page uses separate shortcodes built specifically for the home page
   - End goal will be to reduce the amount of database calls these shortcodes are performing, especially for the home page, but for now we will go with this  
- Removing Rending content from script.js

##Custom-shortcode.php
- Added shortcode to display download image and link to PS&F branded PDF, hosted on on IMA
- Reverted back to using excerpt() instead of content()
  - This is because we're adding the shortcode for the download image in the content. If we used the content for the archive the [hr_image] shortcode renders on page

##Single.php
- Displays the content instead of excerpt
- Had a section that rendered differently based on what category it was, but this has been removed to make that section more accessible. Using a shortcode instead.
