/**
 * Laravel-UIKit
 *
 * Author: Sowren Sen (sowrensen@gmail.com)
 * Repository: https://github.com/sowrensen/laravel-uikit
 */

class LaravelUikit {
  constructor () {
    this.registerSidebarToggleEventListener()
  }

  registerSidebarToggleEventListener () {
    document.getElementById('sidebar-toggler')
      .addEventListener('click', function (e) {
        let wrapper = document.getElementById('wrapper')
        wrapper.classList.toggle('extra-padding')
      })
  }
}

module.exports = LaravelUikit
