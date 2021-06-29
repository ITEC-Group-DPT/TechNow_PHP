<?php
    function chooseJSFile($page_name)
    {
        $js = "js/";
        if ($page_name == "index")
            $js .= "main";
        else if ($page_name == "signin" || $page_name == "signup")
            $js .= "login";
        else
            $js .= $page_name;

        $js .= ".js";
        echo $js;
    }
?>