;(function($, undefined) {

  /**
   * Ação do botão flutuante de add
   */
  $('.btn-add').on('click', function() {
    var default_controller = '/contact';
    if (/^\/contact/.test(location.pathname)) {
      if (!/^\/contact\/add\/?/.test(location.pathname)) {
        location.href = '/contact/add';
      }
    } else if (/^\/organization/.test(location.pathname)) {
      if (!/^\/organization\/add\/?/.test(location.pathname)) {
        location.href = '/organization/add';
      }
    } else {
      location.href = default_controller + '/add';
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

  /**
   * Formata as datas
   */
  $('.datetime').each(function(i, e) {
    try {
      $(e).attr('data-default', $(e).text());
      $(e).text(new Date($(e).text()).toLocaleString());
    } catch (e) {

    }
  });

  /**
   * Inicializa o material design
   */
  $.material.init();

})(jQuery);
