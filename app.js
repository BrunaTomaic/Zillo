// $('#btnAddAgent').click( function(){
//     var sNewAgentName = $('#txtNewAgentName').val()
//     var sNewAgentEmail = $('#txtNewAgentEmail').val()
//     // Pass the name and email so it can be saved in the file
//     // Get the id for the agent
//     $.ajax({
//       url : "api-create-agent.php", // the end-point
//       method : "POST", // pass via post
//       data : $('form').serialize(), // create the form to be passed
//       dataType : "JSON" // get text and convert it into JSON
//     })
//     .done( function( jData  ){
//       console.log( jData.id )  
//       var sDivNewAgent = `
//       <div id="${jData.id}" class="agent">
//         <input data-update="name" type="text" value="${sNewAgentName}">
//         <input data-update="email" type="text" value="${sNewAgentEmail}">
//         <a href="property-update.php?id={{id}}">Update</a>
//         <a href="property-delete.php?id=${jData.id}">Delete</a>
//       </div>`
//       $('#agents').prepend(sDivNewAgent)
//     })
  
  
//   })
  
  $(document).on(  'blur', '.agent input', function(){
  // $('.agent input').blur( function(){
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