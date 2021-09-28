<?php
    function chooseCSSFile($page_name){
		$page_name = strtolower($page_name);

        $css = "css/";
        if ($page_name == "index")
            $css .= "style";
        else $css .= $page_name;
        $css .= ".css";
        echo $css;
    }
?>
