<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace view;

/**
 * Description of TopMenu
 *
 * @author wmacevoy
 */
class TopMenu extends Text {
    public $items = array("Home" => "index.php", "Chart Create" => "chartcreate.php");
    function __construct() {
        parent::__construct();
        global $user;
        if($user->authenticated()){
            $this->items["Logout"] = "logout.php";
        } else {
            $this->items["Login"] = "login.php";
        }
    }
    function generate() {
        echo<<<END
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">ChartCreator</a>
        </div>
        <ul class="nav navbar-nav">
END;
        foreach ($this->items as $name => $link) {
            echo "<li><a href=\"$link\">$name</a></li>\n";
        }
        echo <<<END
        </ul>
    </div>
</nav>
END;
        
    }
}
