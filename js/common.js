$(document).ready(function () {
  if ($('.search__button').length) {
    $('.search__button').on('click', function () {
      $('.search').toggleClass('active')
      if ($('.search').hasClass('active')) {
        $('#searchIconOpen').hide();
        $('#searchIconClose').show();
      } else {
        $('#searchIconClose').hide();
        $('#searchIconOpen').show();
      }
      
    })
  }

  if ($('.search__close').length) {
    $('.search__close').on('click', function () {
      $('.search').removeClass('active')
    })
  }

  if ($('.menu__button').length) {
    $('.menu__button').on('click', function () {
      $('.main-nav').toggleClass('active')
      $('body').toggleClass('menu-active')
    })
  }

  if ($('.overlay').length) {
    $('.overlay').on('click', function () {
      $('.main-nav').removeClass('active')
      $('body').removeClass('menu-active')
    })
  }
})
