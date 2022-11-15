console.log('--- validation.js Top ---');
let forms = document.querySelector('.needs-validation');
forms.addEventListener('submit', valider);
function valider(e){
    if(forms.checkValidity() == false){
        console.log('--- im if ---');
        e.preventDefault();
    }
    forms.classList.add('was-validated');
    console.log('---After validation---');

}


function getCookie(myCookieName){
    var cookieList = (document.cookie) ? document.cookie.split(';') : [];
    var cookieValues = {};/*all cookie names and valuess*/
    for (var i = 0, n = cookieList.length; i != n; ++i) {
        var cookie = cookieList[i];
        var pointer = cookie.indexOf('=');
        if (pointer >= 0) {
            var cookieName = cookie.substring(0, pointer);
            var cookieValue = cookie.substring(pointer + 1);
            
            console.log ("cookieName + " + cookieName + " cookieValue " + cookieValue);
            
            if (!cookieValues.hasOwnProperty(cookieName)) {
                cookieValues[cookieName] = cookieValue;
            }
            if (cookieName === myCookieName) {
                return cookieValue;
            }else{
                return false;
            }
        }
    }
}
const body = document.body;
body.onload = serverFormValidation;

function setCookie(name, value, days) {
    var d = new Date;
    d.setTime(d.getTime() + 24*60*60*1000*days);
    document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString()+"; SameSite = lax;";
}


setCookie("test", "testvalue", -1);

setCookie("zoo", "zootestvalue2", -1);

function serverFormValidation(){
    console.log(getCookie("zoo"));
    /* if(getCookie("error_data") !== ""){
        var showErrors = document.getElementById('myElementID');
        showErrors.innerHTML = "Fehler: Formular Angaben waren fehlerhaft";
    } */
}