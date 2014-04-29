<?php
    
class Example extends Plugin
{
    function init()
    {
        //Initialisation code goes here
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