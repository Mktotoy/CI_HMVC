/**
 * Created by Thomas AONZO - M418485 on 19/11/2015.
 */

function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    if(rowCount < 25){                            // limit the user from creating fields more than your limits
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;
        for(var i=0; i <colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        }
    }else{
        alert("Maximum Tarifs per Contrats is 25");

    }
}

function removeRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var i =rowCount -1;
    var row = table.rows[i];

    if(rowCount> 1) {              // limit the user from removing all the fields
        table.deleteRow(i);
        }

}


function verificationLTA($lta) {
    if($lta.toString().length==8){

        var $mod=$lta%10;
        var $num=parseInt($lta/10);
        return ($num % 7 == $mod);
    }
    else
        return false;
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
$(function () {
    $('[data-toggle="popover"]').popover({
            html: true
    });
})
