Matt's PHP Framework
=====================

*I'm in the process of improving the documentation and code on this framework*

Matt's PHP Framework is an object oriented plugin system and templating engine built on PHP. It allows your website to be modular, and easy to skin and improve.

## File structure

### / (top level)
Top level folder
```
/.htaccess        <-- Defines friendly URLs (rewrites)
/index.php        <-- Define your skin and plugins here
/index.xml        <-- Your index page
/another-page.xml <-- Example of another page
```

### /common
Contains all the central files for your website

### /common/skins
Contains the skins for your website
```
/common/skins/desktop.htm     <-- Example skin, this contains the look and feel of your website
```

### /common/objects
Contains the project class and plugins
```
/common/objects/project.php   <-- Contains the templating engine and plugin system
/common/objects/example.php   <-- An example plugin you can copy for your own needs
```

## /common/error
Contains the error pages
```
/common/error/error404.xml    <-- Example error 404 page
```

