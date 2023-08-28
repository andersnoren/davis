=== Davis ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.4
Requires PHP: 5.4
Tested up to: 6.3
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Activate the theme

== Licenses ==

PT Serif
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/PT+Serif


== Changelog ==

Version 2.1.2 (2023-08-28)
-------------------------
- Adjusted the CSS reset.
- Fixed missing margins between blocks in the post content.

Version 2.1.1 (2022-07-01)
-------------------------
- Improved fonts.css enqueue for child themes.

Version 2.1 (2022-06-29)
-------------------------
- Switched from the Google Fonts CDN to font files included in the theme folder.
- Bumped "Tested up to" to 6.0.
- Removed www prefix from andersnoren.se URLs.
- Added "Requires PHP" to style.css and readme.txt.

Version 2.0.0 (2020-05-08)
-------------------------
- Removed the dark mode setting from Davis, since it added quite a bit of bulk to a theme meant to be as small as possible.
- Updated the theme description accordingly.
- Bumped "Tested up to" to 5.4.1.
- Fixed the 404 message showing up on search pages without results.
- Display excerpts on search results pages, instead of the full content.

Version 1.20 (2020-04-11)
-------------------------
- Fixed badly formatted GNU text in style.css header.
- Removed the "Comments are closed" text when comments are closed.
- Changed "Tested up to" to 5.4.
- Changed footer targeting to use a class instead (`.site-footer`), to prevent plugin targeting conflicts.
- Removed the live preview of the Dark Mode option, to simplify the theme further.
- Removed the custom sanitation function for the Customizer checkbox control, since `sanitize_text_field()` works just as well.
- Made the Davis_Customize class use camelcase naming, and made it pluggable.
- Removed the `is_admin()` check in wp_enqueue_scripts(), since it only gets triggered on the front-end.
- Removed manual inclusion of language file, since GlotPress handles that for us.
- Removed the `post-image` image size, and replaced it with use of the post thumbnail.
- Added a class to the nav element (`.site-nav`) and updated targeting, to prevent targeting conflicts with blocks and plugins.
- Updated the readme file.

Version 1.19 (2019-07-20)
-------------------------
- Added theme URI to style.css
- Updated "Tested up to"
- Added theme tags
- Don't show comments if the post is password protected
- Don't show the post thumbnail if the post is password protected
- Fixed search archive header not being displayed
- Better menu styling

Version 1.18 (2019-04-13)
-------------------------
- Fixed the theme containing multiple text domains

Version 1.17 (2019-04-13)
-------------------------
- Site title is now a h1 only on the front page, and the post title is a h1 on single (instead of a h2)
- Added output of archive-title and archive-description
- Set a max-width for the site-description, and increased its line-height
- Adjusted targeting to be more specific, less prone to hit unintended elements
- Added theme version to stylesheet enqueue for cache busting
- Formatting

Version 1.16 (2019-04-07)
-------------------------
- Added the new wp_body_open() function, along with a function_exists check

Version 1.15 (2019-01-11)
-------------------------
- Fixed the pagination not working on the last page
- Center the paragraph on 404 page

Version 1.14 (2018-12-15)
-------------------------
- Accessibility updates:
	- Added skip links
	- Added keyboard navigation support to the main menu
	- Removed superfluous title attributes
	- Updated heading structure
	- Added aria landmarks, made the HTML more semantic
	- Updated colors to achieve AA contrast
- Better handling of embeds
- Updated theme description

Version 1.13 (2018-10-07)
-------------------------
- Added Gutenberg support, block styling

Version 1.12 (2017-12-03)
-------------------------
- Made functions.php functions pluggable
- Code cleanup

Version 1.11 (2017-11-29)
-------------------------
- Switched from wp_print_styles to wp_enqueue_scripts to enqueue scripts and styles

Version 1.10 (2017-11-25)
-------------------------
- Wrapped the site description output in the header in a conditional
- Added a demo link to the theme description
- Code review with formatting improvements and updates for readability

Version 1.09 (2017-07-17)
-------------------------
- Removed an inline style on .wrapper that a) wasn't being used, and b) was causing issues in Firefox

Version 1.08 (2017-07-15)
-------------------------
- Updated readme.txt to match the format, and added changelog info from changelog.txt
- Removed changelog.txt
- Added the Dark Mode to the customizer

Version 1.07 (2016-11-30)
-------------------------
- Set <em> to display text as italic

Version 1.06 (2016-10-02)
-------------------------
- Escaped the home_url() outputs in the header and footer

Version 1.05 (2016-10-02)
-------------------------
- Fixed HTML5 related errors within the <head>
- Replaced .header and .footer with the <header> and <footer> HTML5 elements
- Moved the header out of the wrapper to allow for menus with more links without line breaks
- Fixed an issue with sub menus deeper than one level

Version 1.04 (2016-07-26)
-------------------------
- Changed the blog title to a h2 element, and the single post titles to h1 elements (thanks, Christina!)

Version 1.03 (2016-06-18)
-------------------------
- Updated to comply with the new theme directory tags

Version 1.02 (2016-06-18)
-------------------------
- Improved PHP structure, cleaned up CSS

Version 1.01 (2016-05-11)
-------------------------
- Improved PHP structure, cleaned up CSS
- Updated the font-stack to not fallback to a sans-serif font
- Removed readme.txt contents from changelog.txt and added an actual changelog

Version 1.0
-------------------------