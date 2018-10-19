$(function() {
    var botones = $(".cont button");
    botones.click(function() {
      botones.removeClass('activo');
      $(this).addClass('activo');
    });
  });