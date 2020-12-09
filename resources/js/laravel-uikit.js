/**
 * Laravel-UIKit
 *
 * Author: Sowren Sen (sowrensen@gmail.com)
 * Repository: https://github.com/sowrensen/laravel-uikit
 */

class LaravelUikit {
  constructor () {
    let element = document.getElementById('sidebar-toggler');
    if (element) {
      this.registerSidebarToggleEventListener(element)
    }
  }

  registerSidebarToggleEventListener (element) {
    element.addEventListener('click', function (e) {
        let wrapper = document.getElementById('wrapper')
        wrapper.classList.toggle('extra-padding')
      })
  }
}

module.exports = LaravelUikit
