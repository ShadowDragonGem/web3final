$(document).ready(function(){
    var chart = document.getElementById('mychart');
    var currentcolor;

    $("#submit").click(function(event) {
        var colorchanges="";
        var numOfcolM=0;
        var numOfcolC=0;
        var data=Array();
        var rownum=chart.rows.length;
        var colnum=chart.rows[0].cells.length;
        data['rows']=rownum;
        data['cols']=colnum;
        data['chartname']= $("#chartName").val();
        for (var row = 0; row < rownum; ++row) {
            for (var col = 0; col < colnum; ++col) {
                
                if (chart.rows[row].cells[col].classList.contains("contrast1") && numOfcolM > 0) {
                    colorchanges = colorchanges.concat(numOfcolM, "M");
                    numOfcolM=0;
                    numOfcolC++;
                }else if (chart.rows[row].cells[col].classList.contains("contrast1") && numOfcolM== 0){
                    numOfcolC++;
                } else if(!chart.rows[row].cells[col].classList.contains("contrast1") && numOfcolC > 0){
                    colorchanges = colorchanges.concat(numOfcolC, "C");
                    numOfcolC=0;
                    numOfcolM++;
                }else if(!chart.rows[row].cells[col].classList.contains("contrast1") && numOfcolC == 0){
                    numOfcolM++;
                }
                if(row == rownum-1 && col == colnum-1){
                    if (numOfcolM > 0){
                        colorchanges = colorchanges.concat(numOfcolM, "M");
                        numOfcolM=0;
                    } else if (numOfcolC>0){
                        colorchanges = colorchanges.concat(numOfcolC, "C");
                        numOfcolC=0;
                    }
                }
            }
        }
        data['colChanges'] = colorchanges;
        console.log(data);
        
        $.post("chartsave.php", {rows: data['rows'], cols: data['cols'], chartname: data['chartname'], colChanges: data['colChanges']}, function() {
            $("#responce").text("Successfully saved chart"); 
        });
        
        event.preventDefault();
    });
    function addRow(){
        var row= chart.insertRow(chart.rows.length);
        var i;
        for (i=0; i< chart.rows[0].cells.length; i++){
            row.insertCell(i);
        }
    }

    function addColumn(){
        var    i;
        for(i=0; i<chart.rows.length; i++){
            chart.rows[i].insertCell(chart.rows[i].cells.length);
        }
    }

    function delRow(){
        if(chart.rows.length >1){
            chart.deleteRow(chart.rows.length-1);
        }
    }

    function delCol(){
        if(chart.rows[0].cells.length > 1){
            for(var i = 0; i < chart.rows.length; i++){
                chart.rows[i].deleteCell(chart.rows[i].cells.length-1);
            }
        }
    }
    
    $("#addCol").click(function(){
        addColumn();
    });
    
    $("#addRow").click(function(){
        addRow();
    });
    
    $("#delRow").click(function(){
        delRow();
    });
    
    $("#delCol").click(function(){
        delCol();
    });
    
    $("table").on("click",'td', function(){
        $(this).toggleClass("contrast1");
    });
    
    
    
});