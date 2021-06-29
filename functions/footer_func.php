<?php
    function chooseJSFile($page_name)
    {
        $css = "js/";
        if ($page_name == "index")  
            $css .= "main";
        else
            $css .= $page_name;
        
        $css .= ".js";
        echo $css;
    }
?>