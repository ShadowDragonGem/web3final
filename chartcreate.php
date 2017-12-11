<?php

 require 'src/config.php';
    
    class ChartCreate extends view\Page{
        public $rows;
        public $cols;
        
        function __construct(){
            parent::__construct();
            global $user;
        }
        
        function body(){
            parent::body();
            $this->add($this->chartManip());
            
        }
        
        function chartManip(){
            $html=<<<END
<div class="container" >
    
    <form>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control" id="chartName" placeholder="Chart Name">  
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-info" id="addRow" value="Add Row"/>
                <input type="button" class="btn btn-info" id="delRow" value="Delete Row"/>
                <input type="button" class="btn btn-info" id="addCol" value="Add Column"/>
                <input type="button" class="btn btn-info" id="delCol" value="Delete Column"/>
                <input id="submit" type="submit" class="btn btn-info" value="Save Chart"/>                
                <br>
            </div>
        </div>
    </form>    
              
    
    <div class="row">
        <table class="table table-bordered" id="mychart">
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
        </tbody>
      </table> 
      
    </div>
    
    <p id="responce"></p>
</div>
                  
END;
            
            echo $html;
        }
        
        function chartGenerate(){
            $html=<<<END
<p>Rows = $this->rows, Cols = $this->cols </p>
END;
            
            echo $html;
        }
    }
    $chartcreate = new ChartCreate();
    $chartcreate->generate();