function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      url = "https://graph.facebook.com/oauth/access_token?client_id=1777392115863720&client_secret=91ccda6a9299989bad6fdd3ef7851be0&grant_type=fb_exchange_token&fb_exchange_token="+response.authResponse.accessToken;
      $.get(
          url,
          function(data) {
             alert('Token actualizado ' + data);
          }
      );
      // testAPI();
    } else if (response.status === 'not_authorized') {
      document.getElementById('status').innerHTML = 'Please log ' +
      'into this app.';
        } else { // No esta logueado en face, y no sabe si esta logueado en la aplicacion
          document.getElementById('status').innerHTML = 'Please log ' +
          'into Facebook.';
      }
}




function checkLoginState() {
    FB.getLoginStatus(function(response) {
        return statusChangeCallback(response);
    });
}

window.fbAsyncInit = function() {
    FB.init({
        appId      : '1777392115863720',
        cookie     : true, 

        xfbml      : true, 
        version    : 'v2.5'
    });

    FB.getLoginStatus(function(response) {
        return statusChangeCallback(response);
    });
};


(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
      'Thanks for logging in, ' + response.id + '!';
  });
}

window.fbAsyncInit = function() {
    FB.init({
      appId      : '1777392115863720',
      xfbml      : true,
      version    : 'v2.8'
  });
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function refrescar () {
  prueba = checkLoginState();
}

setInterval(refrescar, 900000);