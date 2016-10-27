/**
 * Created by Thomas AONZO - M418485 on 01/03/2016.
 */
function getXMLHttpRequest(){
    var xhr = null;

    if(window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }

        } else{
            xhr = new XMLHttpRequest();
        }

    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHttpRequest...");
        return null;
    }
    return xhr;
}




