<?php

/* 
view - jmeno sablony bez pripony
data - pole dat pro zobrazeni
return_code - umozni vratit html pro dalsi zpracovani
*/
function showTemplate($view, $data, $return_code = false): mixed {
    if(!$view) return "šablona nezadána";
    $template_file = VIEW.$view.".php";
    if(!file_exists($template_file)) return "soubor šablony neexistuje!";
    if(is_array($data)) {
        extract($data); //pripravi data z pole jako promenne
    }
    if($return_code) ob_start(); 
    include $template_file;  //zpracuje sablonu
    if($return_code) return ob_get_clean();  //ziska data z bufferu a vrati
    return "";
}

function showLayout($layout, $data) {
    showTemplate("layout/head", $data);
    showTemplate("layout/header", $data);
    if ($data["current"] == "administration") {
        showTemplate("administration/menu", $data);
    }
    showTemplate("".$layout, $data);
    showTemplate("layout/footer", $data);
}