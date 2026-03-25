(function () {
  var installButton = document.getElementById('pwa-install-btn');
  var deferredPrompt = null;

  function isAndroid() {
    return /android/i.test(navigator.userAgent);
  }

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
    } else if (isAndroid()) {
      msg = 'Tap the browser <b>menu (⋮)</b> at the top-right, then choose <b>"Add to Home screen"</b> or <b>"Install app"</b>.';
    } else {
      msg = 'Use your browser menu and choose <b>"Install app"</b> or <b>"Add to Home screen"</b>.';
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
  });

  installButton.addEventListener('click', function (event) {
    event.preventDefault();

    if (deferredPrompt) {
      deferredPrompt.prompt();
      deferredPrompt.userChoice.then(function (choiceResult) {
        deferredPrompt = null;
        if (choiceResult.outcome === 'accepted') {
          installButton.style.display = 'none';
        }
      });
    } else if (window.location.protocol === 'https:' && !isIOS()) {
      // On HTTPS (non-iOS) the browser handles install; prompt not ready yet or
      // already installed — nothing to do, browser chip will appear automatically
      showFallbackGuide();
    } else {
      showFallbackGuide();
    }
  });

  window.addEventListener('appinstalled', function () {
    deferredPrompt = null;
    installButton.style.display = 'none';
  });
})();
