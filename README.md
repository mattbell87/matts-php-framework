Matt's PHP Framework
=====================

Matt's PHP Framework is an object oriented plugin system and template engine built on PHP. The purpose of this framework is give you a decent PHP boilerplate to build on, make your more website modular and to enable you to skin your website easily without affecting your content.

## Requirements
* Apache
* Apache Rewrite Engine enabled
* PHP 5.x

## Installation
1. Download the [latest copy of the framework](https://github.com/mattbell87/matts-php-framework/archive/master.zip)
2. Extract everything to your website (or a folder under the Apache document root)

## File structure

### / (top level)
Top level folder

       /.htaccess        <-- Defines friendly URLs (rewrites)
       /index.php        <-- Define your skin and global plugins here
       /index.xml        <-- Your index page
       /another-page.xml <-- Example of another page

### /app
Contains the framework

       /app/framework.php   <-- Contains the template engine and plugin system

### /app/skins
Contains the skins for your website

       /app/skins/responsive.htm    <-- An example skin, this contains the visual layout for your website

### /app/plugins
Contains the plugins

       /app/plugins/example.php   <-- An example plugin you can copy and modify for your own needs

### /app/error
Contains the error pages

       /app/error/error404.xml    <-- Example error 404 page

## Using XML Files

This framework uses XML files to contain your page content. When someone views your website it takes the skin file and combines it with an XML file to produce the output.

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

The must useful built in function is {{root}}. This is useful if you'd like to keep all of your paths root relative, but still have the ability to move your entire website into a subfolder.

For example if your entire website was located at http://localhost/projects/work/testwebsite/
```xml
<a href="{{root}}">Home</a>
```
would output:
```xml
<a href="/projects/work/testwebsite/">Home</a>
```

### Calling plugin functions

Plugin functions also use the {{function}} syntax. In order to call a plugin function you'd use something like {{MyPlugin.MyFunction}}. Here is an example.

When you build a basic plugin it might look something like this:

**/app/plugins/example.php:**
```php
<?php

class Example extends Plugin  //Note the class name here "Example"
{
    function init()
    {
        //Initialisation code goes here
    }

    function sayHi()  //Note the function name here "sayHi"
    {
        return "Hello World";
    }
}

?>
```

Based on the above if you wanted to output the sayHi() function to your homepage, you'd code it like the following:

**index.xml:**
```xml
<?xml version="1.0"?>
<page>
       <title>My home page</title>
       <plugin>example.php</plugin>  <!-- Note the plugin is called here -->
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

**/app/plugins/example.php:**
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
    if ( isset($params['myoptionalparam']) )
    {
        //do stuff
    }
}

```
