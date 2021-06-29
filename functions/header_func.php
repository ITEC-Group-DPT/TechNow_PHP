<?php
    function chooseCSSFile($page_name)
    {
        $css = "css/";
        if ($page_name == "index")  
            $css .= "style";
        else
            $css .= $page_name;
        
        $css .= ".css";
        echo $css;
    }
?>