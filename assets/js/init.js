$(document).ready(function () {
  $('.only-number').on('input', function(){
    var value = $(this).val();
    $(this).val(value.replace(/[^0-9]/g, ''));
  });
  $('.logout').click(function(e){
    e.preventDefault();
    $('#form-logout').submit();
  })
});