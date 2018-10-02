$(document).ready(function(){

  $('#enddate').attr('autocomplete','off');
  $('#enddate').datetimepicker({
      "setDate": new Date(),
      format:'Y-m-d H:m:i',
      minDate: new Date()
       
  });


  
    

}