Blackboard Theme
================

This is a simply naked theme, it has minimal HTML and as much of the WordPress native functionality as I've come to need.

+ This project is focused for developers because it has no styles and design at all so it's an open canvas to built your theme upon.

+ It's optimized for HTML5 as it validates properly and I've tried to enforce the use of HTML5 best standards.

+ Comes with a comprehensive CSS breakdown that also happens to contain a lot of the WordPress default CSS styles based on the classes it renders.

+ It has most of the theme templates that WordPress allows to provide you with a solid start-up point.

The effort is by no means a complete idea yet but I plan to continue updating this theme as my needs continue to grow because I make this project for me but I also share it because it might work for you.

Changelog
================

__2.2.1 - November 4, 2014__

+ Added the function to make the theme translation ready (I realized I missed it on the last update, doh!)
+ Added placeholder for bootstrap and fontawesome on the functions.php so you just uncomment it to enable it (had do face it, I'm using it very much in 90% of my projects.)
+ Deleted a US translation file I had there for some reason, it's not needed, the theme in in English.
+ Updated a small translation on the Spanish .PO file.

__2.2 - September 10, 2014__

+ First and foremost, I modified a lot of code spacing and things like that in order to keep the coding style as consistent as possible. What this update did is help the validation of the theme so it's fully accepted by WordPress Theme Development standards and at the same time test well with the WordPress Theme Unit Test Environment.
+ Fixed the deprecated add_background tag and added the new add_theme_support tag with the 'custom-background' parameter.
+ Added the "Tags" tag to the style.css to comply with WordPress theme development standards.
+ Added the single post pagination, again to comply with WordPress theme development standards.
+ Added the Post Tags with the_tags(); inside the loop to comply with WordPress theme development standards.
+ Updated the previous version I forgot to document in the readme.md file (oops!)
+ Added the post navigation to comply with WordPress theme development standards.
+ Added the comment pagination to comply with WordPress theme development standards.
+ Updated the header.php and a couple of other files that were using bloginfo('template_url') to instead use echo get_template_directory_uri(); to comply with Wordpress theme development standards.
+ Added the readme.txt file to comply with WordPress theme development standards.
+ Added the add_editor_style theme support to remove the tinyMCE CSS from style.css and load it the way WordPress would prefer we do this.
+ Added the theme support for the automatic-feed-links to comply with the WordPress theme development standards.
+ Added the $content_width variable to my functions.php to be able to set a $content_width that is used by plugins and other things so it  doesn't break the theme, this is especially useful to set the size of the oEmbed feature... again, to comply with WordPress theme development standards.
+ Removed the trackback code from the functions that was for counting comments and trackbacks as it was causing an error.
+ Broke down the style.css into another file called editor-style.css to place the editor styles in compliance with WordPress Theme standards.
+ Added the comment-reply script that's required to be in compliance with WordPress Theme standards
+ Added a License for the Theme.
+ Commented out the Post Format because it's not implemented yet into the loops.
+ Added is_front_page condition to the <title> tag in order to display the frontpage name and blog name.
+ Fixed all the text-domain issues with not using the proper "slug" as WordPress recomments, so I replaced 'blvckbrd' with 'blackboard' to comply.
+ Added a couple of "usual" things to the header and the footer such as Site name, Site Description, Copyright year, etc, etc.
+ Added the pagination links wherever necessary, such as: index.php, archives.php, etc.
+ Added a default Blackboard Favicon that can easily be overwritten so it's linked and in place already.
+ Added post meta data to the single.php, it can easily be stripped out or pick any of the elements you would like to keep and use in your project.
+ Added the comments if statement for the page.php and the single.php so the comments show as they should.
+ Added the /lang/ folder with a Spanish translation and the es_MX.po and es_MX.mo as well as a clean en_US.po file to use for your own translation
+ Added the wp_nav_menu to the header and to the footer with all parameters in default except for the already defined location parameter.

__2.1.1 - August 27, 2014__

+ Added Helper Classes to the CSS file

__2.1 - August 22, 2014__

+ Started adding the stock WordPress CSS selectors; added the styles for the WYSIWYG editor
+ Added the selectors for the Native WordPress Gallery
+ Added the selectors for the Comments with Nested and Admin Styles
+ Included at the top of the CSS the @media queries for Responsive displays
+ Updated the package to include a Child version of Blackboard
+ Added the "Tags:" to the theme's info that is pulled from the style.css file
+ Fixed a couple of indentation issues in the comments.php file

__2.0 - August 12, 2014__

+ Just released.
+ Note that GIT was started at version 2.0 because I was keeping my own lame version control before and I recently thought of turning this into a project for everyone else to use.