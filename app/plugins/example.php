<?php

class Example extends Plugin
{
    function pluginLoaded()
    {
        // (optional) Code that runs when the project loads the plugin
        // $this->project is available from here.
    }

    function exampleFunction()
    {
        return "Example Function says Hi!";
    }

    function exampleFunction2($params)
    {
        return "Example Function 2 says: ".$params['say'];
    }

}

?>
