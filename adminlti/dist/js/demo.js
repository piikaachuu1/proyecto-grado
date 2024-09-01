/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
  
  var $sidebar = $('.control-sidebar')
  var $container = $('<div />', {
    class: 'p-3 control-sidebar-content'
  })

  $sidebar.append($container)

  // Checkboxes

  $container.append(
    '<h5>Personalizar</h5><hr class="mb-2"/>'
  )


  var $sidebar_mini_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('sidebar-mini'),
    class: 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('sidebar-mini')
    } else {
      $('body').removeClass('sidebar-mini')
    }
  })

  
  var $sidebar_mini_container = $('<div />', { class: 'mb-1' }).append($sidebar_mini_checkbox).append('<span>Sidebar Mini</span>')
  $container.append($sidebar_mini_container)

  var $sidebar_mini_md_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('sidebar-mini-md'),
    class: 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('sidebar-mini-md')
    } else {
      $('body').removeClass('sidebar-mini-md')
    }
  })
  var $sidebar_mini_md_container = $('<div />', { class: 'mb-1' }).append($sidebar_mini_md_checkbox).append('<span>Sidebar Mini MD</span>')
  $container.append($sidebar_mini_md_container)



})(jQuery)
