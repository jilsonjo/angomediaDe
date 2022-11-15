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
    fetch("php/contact.php", {
      method: "POST",
      body: inputData,
    })
      .then((res) => res.json())
      .then((data) => {
        console.log("3. .then((data)");
        var dataObject = {};
        for (let [key, value] of Object.entries(data)) {
          dataObject[key] = value;
          console.log(value);
        }

        let formError = document.getElementById("serverError");

        if (dataObject.dataError == true) {
          formError.innerHTML = "Fehler: Bitte überprüfen Sie Ihren Angaben!";
        } else if (dataObject.dbError !== false) {
          formError.innerHTML =
            "Systemfehler: Bitte versuchen Sie es zu einem späteren Zeitpunkt!";
        } else {
          window.location.replace("https://angomedia.de/thanks.html");
        }
      })
      .catch(console.error);
  }
}
