$(function() {
  $('body').fadeIn();
  $('.a').click(function(e){
    window.goto=$(this).attr("href");
    $('body').fadeOut('fast',function(){
      document.location.href=window.goto;
    });

    e.preventDefault();
  });
});