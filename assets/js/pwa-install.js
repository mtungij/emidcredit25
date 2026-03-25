(function () {
  var installButton = document.getElementById('pwa-install-btn');
  var deferredPrompt = null;
  var pendingClick = false;

  function isIOS() {
    return /iphone|ipad|ipod/i.test(navigator.userAgent);
  }

  function isStandaloneMode() {
    return window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true;
  }

  function showFallbackGuide() {
    var msg = '';
    if (isIOS()) {
      msg = 'Tap the <b>Share</b> button in your browser, then choose <b>"Add to Home Screen"</b>.';
    } else {
      msg = 'Tap the browser <b>menu (⋮)</b> at the top-right, then choose <b>"Add to Home screen"</b> or <b>"Install app"</b>.';
    }

    if (typeof swal === 'function') {
      swal({
        title: 'Install Loan Pocket',
        text: msg,
        html: true,
        type: 'info',
        confirmButtonText: 'OK',
        confirmButtonColor: '#00bcd4'
      });
    } else {
      alert('To install: ' + msg.replace(/<[^>]+>/g, ''));
    }
  }

  function doPrompt() {
    deferredPrompt.prompt();
    deferredPrompt.userChoice.then(function (choiceResult) {
      deferredPrompt = null;
      pendingClick = false;
      if (choiceResult.outcome === 'accepted') {
        installButton.style.display = 'none';
      }
    });
  }

  if ('serviceWorker' in navigator && (window.location.protocol === 'https:' || window.location.hostname === 'localhost')) {
    window.addEventListener('load', function () {
      navigator.serviceWorker.register('/service-worker.js').catch(function () {});
    });
  }

  if (!installButton) {
    return;
  }

  if (isStandaloneMode()) {
    installButton.style.display = 'none';
    return;
  }

  window.addEventListener('beforeinstallprompt', function (event) {
    event.preventDefault();
    deferredPrompt = event;
    // If user already clicked while we were waiting, fire immediately
    if (pendingClick) {
      pendingClick = false;
      doPrompt();
    }
  });

  installButton.addEventListener('click', function (event) {
    event.preventDefault();

    if (deferredPrompt) {
      doPrompt();
    } else if (isIOS()) {
      // iOS Safari never fires beforeinstallprompt
      showFallbackGuide();
    } else if (window.location.protocol === 'https:') {
      // Event hasn't fired yet — wait for it (set pending flag)
      pendingClick = true;
      installButton.style.opacity = '0.6';
      // If it doesn't arrive within 4 seconds, show manual guide
      setTimeout(function () {
        if (pendingClick) {
          pendingClick = false;
          installButton.style.opacity = '';
          showFallbackGuide();
        }
      }, 4000);
    } else {
      // Plain HTTP dev environment
      showFallbackGuide();
    }
  });

  window.addEventListener('appinstalled', function () {
    deferredPrompt = null;
    pendingClick = false;
    installButton.style.display = 'none';
  });
})();
