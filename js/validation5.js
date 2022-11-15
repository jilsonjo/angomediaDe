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
    ev.preventDefault();
    if(forms.checkValidity() == true){
        let getForm = ev.target;
        let inputData = new FormData(getForm);
       fetch('php/contact.php', {
          method: 'POST',
          body: inputData,
        })
        .then((res) => res.json())
        .then((data) => {
          var dataObject={};
          for (let [key, value] of Object.entries(data)) {
            dataObject[key] = value;
          }
          console.log(dataObject.cname); 
          if(dataObject.success == true){
            console.log("xxxxxxxxxxxxxxxxx"); 
            document.getElementById("serverError").innerHTML="Fehler beim senden von Formular. Bitte überprüfen Sie Ihren E-Email-Adresse oder versuchen Sie es zu einem späteren Zeitpunkt!";
          }
        })
        .catch(console.error); 
    }  
  }
