$(document).on(  'blur', '.agent input', function(){
    var sAgentId = $(this).parent().attr('id')
    var sUpdateKey = $(this).attr('data-update')
    var sNewValue = $(this).val()
    $.ajax({
      url : "api-update-user.php",
      method : "POST",
      data : { id:sAgentId , key:sUpdateKey , value:sNewValue }
    })
    .done(function(){
      console.log('user has been updated')
    })
  } )
