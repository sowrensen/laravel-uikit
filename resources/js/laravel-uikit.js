$(function () {
  // Toggle sidebar in display larger than 768
  $('#sidebar-toggler').click(function (e) {
    let wrapper = $('#wrapper')
    wrapper.toggleClass('extra-padding')
  })

  // Set up overlay scrollbar
  $('#sidebar').overlayScrollbars({
    className: 'os-theme-light',
    sizeAutoCapable: true,
    scrollbars: {
      autoHide: 'leave',
      clickScrolling: true
    }
  })
})
