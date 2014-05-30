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

### /common/error
Contains the error pages
```
/common/error/error404.xml    <-- Example error 404 page
```

## Using XML Files

Matt's PHP Framework uses XML files to contain your page content. The framework takes the skin file and combines it with an XML file to produce the entire page.

### Your first XML file

This is an example of what your index page could look like

**index.xml:**
```xml
<?xml version="1.0"?>
<page>
       <title>My home page</title>
       <content>
              <p>Welcome to my Home Page.<p>
       </content>
</page>
```

### Calling built in functions

The must useful built int XML function is {{root}}. This is useful if you'd like to keep all of your paths root relative, but still have the ability to move your entire website into a subfolder.

For example if your entire website was located at http://localhost/projects/work/testwebsite/
```
<a href="{{root}}">Home</a>
```
would output:
```
<a href="/projects/work/testwebsite/">Home</a>
```

### Calling plugin functions

Plugin functions also use the {{function}} syntax. In order to call a plugin function you'd use something like {{MyPlugin.MyFunction}}. Here is an example.

When you build a basic plugin it might look something like this:

**/common/objects/example.php:**
```php
<?php

class Example extends Plugin
{
    function init()
    {
        //Initialisation code goes here
    }

    function sayHi()
    {
        return "Hello World";
    }
}
?>
```

If you wanted to output the sayHi() function to your homepage, you'd code it like the folliwing:

**index.xml:**
```xml
<?xml version="1.0"?>
<page>
       <title>My home page</title>
       <plugin>example.php</plugin>
       <content>
              <p>Welcome to my Home Page.<p>
              <p>My plugin says: {{Example.sayHi}}</p>
       </content>
</page>
```

Take note of the &lt;plugin&gt; entry that contains the filename of the plugin.

### Calling plugin functions with paramaters


If you want to use parameters in an XML file and map them to a class, use it like the following:

**Myfile.xml:**
```xml
<?xml version="1.0"?>
<page>
       <title>My page</title>
       <plugin>example.php</plugin>
       <content>
              <p>{{Example.say(text=Hello\, World)}}</p>
              <p>{{Example.name(firstname=Fred,lastname=Bloggs)}}</p>
       </content>
</page>
```

Below you can see that the function is being fed an associative array (or map) of paramaters.

**/common/objects/example.php:**
```php
<?php

class Example extends Plugin
{
    function init()
    {
        //Initialisation code goes here
    }

    function name($params)
    {
        return "My name is " . $params['firstname'].' '.$params['lastname'];
    }

    function say($params)
    {
        return "Example Function 2 says: ".$params['text'];
    }
}

?>
```

If you need to implement optional paramaters you could use this:

```php

function exampleFunction($params)
{
    if (isset($params['myoptionalparam'])
    {
        //do stuff
    }
}

```


