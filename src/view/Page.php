<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace view;

/**
 * Description of Page
 *
 * @author wmacevoy
 */
class Page extends Text {
    function __construct() {
        parent::__construct();
    }
    
    function add($item){
        array_push($this->parts, $item);
    }
    
    function addHead($item){
        array_push($this->headParts, $item);
    }
    
    function generate() {
        $this->doctype();
        $this->html();
    }
    
    public $doctype = "html";
    
    function doctype() {
        echo "<!DOCTYPE $this->doctype>\n";
    }
    
    function redirect($location) {
        $this->doctype();
        echo <<<END
<head>
  <meta http-equiv="refresh" content="0; url=$location" />
</head>
END;
    }
    
    function html() {
        echo "<html>\n";
        $this->head();
        $this->body();
        echo "</html>\n";
    }
    
    public $headParts=array();
    
    function head() {
        echo "<head>\n";
        $this->title();
        echo "<meta charset=\"utf-8\">\n";
        $this->bootstrapIncludes();
        foreach($this->headParts as $part){
            $part->generate();
        }
        
        
        echo "</head>\n";
                
    }
    
    public $title;
    
    function title() {
        if (isset($this->title)) {
            echo "<title>$this->title</title>\n";
        }
    }
    
    function bootstrapIncludes(){
        echo <<<END
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
END;
    }
    
    public $parts = array();
    
    function body() {
        echo "<body>\n";
        (new TopMenu())->generate();
        foreach ($this->parts as $part) {
            $part->generate();
        }
        echo "</body>\n";
    }
}
