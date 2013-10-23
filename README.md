Spoilers
========

Mediawiki extension that allows for spoiler tags.

Installation
------------
To install this extension, add the follwoing lines to the end of the LocalSettings.php file:
```
//Spoilers
require("$IP/extensions/Spoilers/Spoilers.php");
```

Usage Example
---------------------
```
<spoiler hide="hide_message">spoiler_text</spoiler>
<spoiler show="show_message">spoiler_text</spoiler>
<spoiler show="show_message" hide="hide_message">spoiler_text</spoiler>
<spoiler>spoiler_text</spoiler>
```