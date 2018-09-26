Spoilers
========
MediaWiki extension that allows for spoiler tags that will hide a block of text. The spoiler button's show/hide message can be customized for each set.

Installation
------------
To install this extension, add the following lines to the end of the LocalSettings.php file:
```
//Spoilers
wfLoadExtension('Spoilers');
```

Usage Example for `{{#spoiler}}`
-------------
```
{{#spoiler:hide=hide_message|spoiler_text}}
{{#spoiler:show=show_message|spoiler_text}}
{{#spoiler:show=show_message|hide=hide_message|spoiler_text}}
{{#spoiler:spoiler_text}}
```

Usage Example for `<spoiler>`
-------------
```
<spoiler show="show" hide="hide">
<h1>SPOILER!!</h1>
</spoiler>
```
