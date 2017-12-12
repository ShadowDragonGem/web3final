<?php
    require 'src/config.php';
    
    class Index extends view\Page{
        function __construct(){
            parent::__construct();
            $this->title = "Home";
            
            global $user;
            if($user->authenticated()){
                $this->add( new view\Toast("Hi ". $user->name()));
            }else{
                $this->add(new view\Toast("<h1>Welcome!</h1>"));
            }
        }
        
        function body(){
            global $user;
            parent::body();
            if($user->authenticated()){
                $this->add($this->displayCharts());
            }
        }
        
        function displayCharts(){
            global $db;
            $uid=$_SESSION["user"]["id"];
            $sql="SELECT chartid, chartname, rownum, colnum FROM charts WHERE uid = :uid";
            $prepared=$db->prepare($sql, array($db->ATTR_CURSOR => $db->CURSOR_FWDONLY));
            $prepared->execute(array(':uid'=> $uid));
            $results = $prepared->fetchAll(PDO::FETCH_ASSOC);
           
            
            
            if(count($results )> 0){
                echo "<p>Your tables:</p>\n";
                echo "<table  class=\"table table-bordered\"  style=\"width:75%\">\n";
                echo "<tbody>\n";
                echo "<tr>\n";
                echo "<th>ID</th>\n";
                echo "<th>Chart Name</th>\n";
                echo"<th>Number of rows</th>\n";
                echo"<th>Number of columns</th>\n";
                foreach($results as $row){
                    echo "<tr>\n<td>" . $row['chartid']. "</td>\n<td>" . $row['chartname'] . "</td>\n<td>" . $row['rownum'] . "</td>\n<td>" . $row['colnum'] . "</td>\n</tr>\n";
                    
                }
                echo "</tbody>\n";
                echo "</table>\n";
            }
            
        }
    }
    $index = new Index();
    $index->generate();
?>

