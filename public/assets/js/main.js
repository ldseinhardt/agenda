;(function($, undefined) {

  /**
   * Ação do botão flutuante de add
   */
  $('.btn-add-action').on('click', function() {
    var default_controller = '/contact';
    if (/^\/contact/.test(location.pathname)) {
      if (!/^\/contact\/add\/?/.test(location.pathname)) {
        location.pathname = '/contact/add';
      }
    } else if (/^\/organization/.test(location.pathname)) {
      if (!/^\/organization\/add\/?/.test(location.pathname)) {
        location.pathname = '/organization/add';
      }
    } else {
      location.pathname = default_controller + '/add';
    }
  });

  /**
   * Deixa ativado a opção no menu de acordo com o controller
   */
  var navbar = $('.navbar .navbar-nav');
  if (/^\/contact/.test(location.pathname)) {
    navbar.find('li').first().addClass('active');
  } else if (/^\/organization/.test(location.pathname)) {
    navbar.find('li').last().addClass('active');
  }

})(jQuery);
