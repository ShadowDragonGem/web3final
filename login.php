<?php

    require 'src/config.php';
    
    class Login extends view\Page{
        public $pass;
        
        function __construct(){
            parent::__construct();
            $this->title = "Login";
            
        }
        
        function generate() {
            global $user;
            $this->post();
            if ($user->authenticated()) {
                $this->redirect("index.php");
            } else {
                parent::generate();
            }
        }
    
        function posted() {
            return isset($_POST["pass"]) && isset($_POST["user"]);
        }
    
        function post() {
          if (isset($_POST["user"]) 
                  && preg_match("/^ *[A-Za-z0-9]+ *$/",$_POST["user"])) {  
              $this->user = trim($_POST["user"]);
          }
          if (isset($_POST["pass"]) && preg_match("/[^ ]/",$_POST["pass"])) {
              $this->pass = trim($_POST["pass"]);
          }
          if (isset($this->user) && isset($this->pass)) {
              global $user;
              if ($user->authenticate($this->user,$this->pass)) {
                  $user->login($this->user);
              }
          }

        }
    
        function body() {
            parent::body();
            $this->add($this->loginForm());
        }
    
        function loginForm() {
            if ($this->posted()) {
                echo "<h1>Please try again</h1>\n";
            }
            $html = <<<END
<form method="POST" action="login.php">
<div class="form-group">
  <div class="col-xs-4">
  <input type="text" class="form-control" id="usr" name="user" placeholder="User"  value="$this->user" />
  </div>
  <div class="col-xs-4">
  <input type="password" class = "form-control" id="pwd" name="pass" placeholder="Password" />
  </div>
   <input type="submit" class="btn btn-info" value="Submit"/>
</div>
</form>         
<p> Don't have an account? <a href="register.php">Register Here</a></p>
END;
        echo $html;
        
        }
    }
    
(new Login())->generate();