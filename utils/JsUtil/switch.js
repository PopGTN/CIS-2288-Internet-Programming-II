/**
 *  Light Switch @version v0.1.4
 */

document.addEventListener("DOMContentLoaded", (event) =>  {
  let lightSwitch = document.getElementById('lightSwitch');


  if (!lightSwitch) {
    return;
  }


  /**
   * @function darkmode
   * @summary: changes the theme to 'dark mode' and save settings to local stroage.
   * Basically, replaces/toggles every CSS class that has '-light' class with '-dark'
   */
  function darkMode() {
/*    document.querySelectorAll('[data-bs-theme=light]').forEach((element) => {
      element.className = element.className.replace('[data-bs-theme=light]', '[data-bs-theme=dark]');
    });*/
    document.querySelectorAll("html").forEach((element) => {
      if (element.hasAttribute("data-bs-theme")) {
        element.setAttribute("data-bs-theme","dark")
      }
    });

    // set light switch input to true
    if (!lightSwitch.checked) {
      lightSwitch.checked = true;
    }
    localStorage.setItem('lightSwitch', 'dark');
  }

  /**
   * @function lightmode
   * @summary: changes the theme to 'light mode' and save settings to local stroage.
   */
  function lightMode() {
      document.querySelectorAll("html").forEach((element) => {
        if (element.hasAttribute("data-bs-theme")) {
          element.setAttribute("data-bs-theme","light")
        }

      });


/*    document.querySelectorAll('[data-bs-theme=dark]').forEach((element) => {
      element.className = element.className.replace('[data-bs-theme=dark]', '[data-bs-theme=light]');
    });*/

    if (lightSwitch.checked) {
      lightSwitch.checked = false;
    }
    localStorage.setItem('lightSwitch', 'light');
  }

  /**
   * @function onToggleMode
   * @summary: the event handler attached to the switch. calling @darkMode or @lightMode depending on the checked state.
   */
  function onToggleMode() {
    if (lightSwitch.checked) {
      darkMode();
    } else {
      lightMode();
    }
  }

  /**
   * @function getSystemDefaultTheme
   * @summary: get system default theme by media query
   */
  function getSystemDefaultTheme() {
    const darkThemeMq = window.matchMedia('(prefers-color-scheme: dark)');
    if (darkThemeMq.matches) {
      return 'dark';
    }
    return 'light';
  }

  function setup() {
    var settings = localStorage.getItem('lightSwitch');
    if (settings == null) {
      settings = getSystemDefaultTheme();
    }

    if (settings == 'dark') {
      lightSwitch.checked = true;
    }

    lightSwitch.addEventListener('change', onToggleMode);
    onToggleMode();
  }

  setup();
});
