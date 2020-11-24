/**
 * Laravel-UIKit
 *
 * Author: Sowren Sen (sowrensen@gmail.com)
 * Repository: https://github.com/sowrensen/laravel-uikit
 */

class LaravelUikit {
  constructor (variant='dark') {
    this.variant = variant
    this.toggleSidebar()
    this.initializeOverlayScrollbar()
  }

  toggleSidebar () {
    $('#sidebar-toggler').click(function (e) {
      let wrapper = $('#wrapper')
      wrapper.toggleClass('extra-padding')
    })
  }

  initializeOverlayScrollbar () {
    $('#sidebar').overlayScrollbars({
      className: `os-theme-${this.variant}`,
      sizeAutoCapable: true,
      scrollbars: {
        autoHide: 'leave',
        clickScrolling: true
      }
    })
  }
}

module.exports = LaravelUikit
