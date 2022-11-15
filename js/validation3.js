
let forms = document.querySelector('.needs-validation');
forms.addEventListener('submit', valider);
function valider(e){
    if(forms.checkValidity() == false){
        e.preventDefault();
    }
    forms.classList.add('was-validated');
}

forms.addEventListener('submit', submitFormData);

function submitFormData(ev) {
    ev.preventDefault(); //stop the page reloading
    if(forms.checkValidity() == true){
        let myForm = ev.target;
        let inputData = new FormData(myForm);
        /* var object = {};
        inputData.forEach(function(value, key){
            object[key] = value;
        });
        var jsonData = JSON.stringify(object); */
        
       fetch('php/contact2.php', {
          method: 'POST',
          body: inputData,
         /*  headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          } */
        })
        .then((res) => res.json())
        .then((data) => {
          var dataObject={};
          for (let [key, value] of Object.entries(data)) {
            dataObject[key] = value;
          }
          console.log(dataObject.cname); 
          //document.getElementById("serverError").innerHTML="Fehler beim senden von Formular. Bitte überprüfen Sie Ihren Angaben oder versuchen Sie es zu einem späteren Zeitpunkt!";
        })
        .catch(console.error); 
    }  
  }
