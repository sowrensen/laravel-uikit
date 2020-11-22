$(function () {
  $('#sidebar-toggler').click(function (e) {
    let container = $('.content-wrapper')
    if (container.css('padding-left') == '0px') {
      container.css('padding-left', '250px')
    } else {
      container.css('padding-left', '0px')
    }
  })
  $('#sidebar').overlayScrollbars({
    className: 'os-theme-light',
    sizeAutoCapable: true,
    scrollbars: {
      autoHide: 'leave',
      clickScrolling: true
    }
  })
})
