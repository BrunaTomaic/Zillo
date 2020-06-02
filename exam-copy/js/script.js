function addNewProperty() {
  console.log("works");
  var newPropertyForm = document.querySelector("#newPropertyForm");
  //   var bIsValid = fnbIsFormValid(newPropertyForm);
  //   if (bIsValid == false) {
  //     return;
  //   }

  var data = new FormData(newPropertyForm);
  $.ajax({
    method: "POST",
    url: "api-upload-property.php",
    data: data,
    contentType: false,
    processData: false
  }).done(function(sjData) {
    jData = JSON.parse(sjData);
    console.log(jData.message);
    if (jData.status == 1) {
      location.href = "my-properties-agent.php";
    }
  });
}
