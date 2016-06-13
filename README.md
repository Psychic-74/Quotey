# Quotey
A wordpress plugin to show random quotes on each page refresh. Using wp_head() hook.

Works perfectly with each and every theme. Moreover you can custom tune ot to match your needs.
You are provided with the options to use predefined quotes from a list which is updated regularly.
You have various categories to choose from. All those categories will be listed below with usage keyword.
You are also provided with the option to use your own custom content.
See the below instructions on how to achieve that.

# Instructions
By default the plugin uses remote content. To change it to use your custom content, you need to do following things :-
- First of all login to your dashboard.
- Select Plugins > Editor > Quotey
- Scroll to function quotey_custom_content() and add you quotes there.

Please do not remove the " from the start of the first line and last line. Also mind the semi colon ";" at the end of quotes.

Then you need to scroll down to the function print_quote(). There you will see a line saying selected_quote=
Use :-
- quotey_remote_content() to use the quotes from remote server. This is the default option.
- quotey_custom_content() to use your custom defined quotes.

Mind the colon at the last of the line. That's it.
Don't change any further stuff if you don't have proper programming knowledge as doing so will break the plugin.

# Change predefined quotes category
Navigate to function quotey_remote_content().
There you will see a line like this :-

$quotes = file_get_contents('https://raw.githubusercontent.com/black-dragon74/Quotey/wordpress/quotes_inspirational.txt');

You just have to change last block which says quotes_inspirational.txt to the keyword for the category you'ld like to use.
For example :-

$quotes = file_get_contents('https://raw.githubusercontent.com/black-dragon74/Quotey/wordpress/quotes_romantic.txt');
Will use a romantic category.

# Chaging the appearance
If you are not satisfied with the look of the quotes block you can edit the css for that.
To do so, scroll down to the function quotey_stlye().
You have to change the values between #quotey{......} don't change anything else anywhere without proper knowledge.
You can get some basic css info by googling about that.

# List of predefined quotes (categories) :-
- Inspirational Quotes | Keyword: quotes_inspirational.txt

# Installation
Download the RAW zip and upload quotey.php to wp-content/plugins/ directory

Activate from Dash > Plugins.

Enjoy.
