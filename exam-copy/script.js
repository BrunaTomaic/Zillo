$(document).on(  'blur', '.agent input', function(){
    var sAgentId = $(this).parent().attr('id')
    var sUpdateKey = $(this).attr('data-update')
    var sNewValue = $(this).val()
    $.ajax({
      url : "api-update-agent.php",
      method : "POST",
      data : { id:sAgentId , key:sUpdateKey , value:sNewValue }
    })
    .done(function(){
      console.log('agent has been updated')
    })
  } )

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
    // console.log(jData);
    if (jData.status == 1) {
      location.href = "profile.php";
    }
  });
}
