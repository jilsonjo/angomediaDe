//console.log('--- validation.js Top ---');
let forms = document.querySelector('.needs-validation');
forms.addEventListener('submit', valider);
function valider(e){
    if(forms.checkValidity() == false){
        //console.log('--- im if ---');
        e.preventDefault();
    }
    forms.classList.add('was-validated');
    //console.log('---After validation---');
}

forms.addEventListener('submit', submitFormData);

  function submitFormData(ev) {
    ev.preventDefault(); //stop the page reloading
    if(forms.checkValidity() == true){
        //console.dir(ev.target);
        let myForm = ev.target;
        let fd = new FormData(myForm);
        /* for (let key of fd.keys()) {
        console.log(key, fd.get(key));
        } */
        fetch('php/contact2.php', {
            method: 'POST',
            body: fd,
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok.')
            }
          })
          .then((data) => {
            var jsobj = JSON.parse(data);
            console.log(jsobj.count);
            console.log(jsobj.cemail);
            document.getElementById("serverError").innerHTML="Fehler beim senden von Formular. Bitte überprüfen Sie Ihren Angaben oder versuchen Sie es zu einem späteren Zeitpunkt!";
          })
          .catch(console.error);  
    }  
  }
