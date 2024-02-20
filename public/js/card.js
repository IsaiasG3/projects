$(document).ready(function() {
    $('.cart-header').on('click', function() {
      var isOpen = $(this).next('.cart-body').hasClass('show');
      $('.cart-body').collapse('hide');
      if (!isOpen) {
        $(this).next('.cart-body').collapse('show');
        $(this).find('i').toggleClass('bi-plus bi-dash');
      } else {
        $(this).find('i').toggleClass('bi-plus bi-dash');
      }
    });
  });
