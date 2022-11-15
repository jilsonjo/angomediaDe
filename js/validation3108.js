console.log("1xxxxxxxxxxxx");
let forms = document.querySelector(".needs-validation");
forms.addEventListener("submit", valider);
function valider(e) {
  if (forms.checkValidity() == false) {
    e.preventDefault();
  }
  forms.classList.add("was-validated");
}

forms.addEventListener("submit", submitFormData);

function submitFormData(ev) {
  console.log("2.submitFormData(ev)");
  ev.preventDefault();
  if (forms.checkValidity() == true) {
    let getForm = ev.target;
    let inputData = new FormData(getForm);
    /* async function saveData() {
          return (await fetch("php/contact.php", {
            method: 'POST',
            body: inputData,
          })).json();
        } */
    /*  fetch('php/contact.php', {
          method: 'POST',
          body: inputData,
        })
        .then((res) => res.json())
        .then((data) => {
          console.log("3. .then((data)");
         var dataObject={};
          for (let [key, value] of Object.entries(data)) {
            dataObject[key] = value;
          }
          console.log(dataObject.cgender);
          console.log(dataObject.cname); 
          console.log(dataObject.cemail); 
          console.log(dataObject.cfone); 
          console.log(dataObject.cmessage);  
          console.log(dataObject.success);
          let formError = document.getElementById("serverError");

          if(dataObject.insert === false){
            window.location.replace("https://angomedia.de/thanks.html");
          } 
          else{
            formError.innerHTML="Fehler beim senden von Formular. Bitte überprüfen Sie Ihren E-Email-Adresse oder versuchen Sie es zu einem späteren Zeitpunkt!";
          } 
        })
        .catch(console.error);  */
  }
}
