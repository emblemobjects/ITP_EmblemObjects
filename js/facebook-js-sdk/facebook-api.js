/* Facebook API Library*/
// console.log('Facebook API Library');

var facebook = window.facebook || {};

facebook.init = function(appInfo) {
	console.log('called facebook.init()...');

	window.fbAsyncInit = function() {
		FB.init({
			appId      : appInfo.appID, //608964315890524
			cookie     : true,  // enable cookies to allow the server to access the session
			xfbml      : true,  // parse social plugins on this page
			version    : appInfo.ver // use version 2.1
		});

		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		});

	};

	console.log(appInfo.appID, appInfo.ver);

	function statusChangeCallback(response) {
	    console.log('statusChangeCallback');
	    console.log(response);
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
			// Logged into your app and Facebook.

			ajaxSessionCallback();
			displayUsername();
	    } else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.

			// document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
			$('#user-name').html('');
	    } else {
			// The person is not logged into Facebook, so we're not sure if
			// they are logged into this app or not.

			// document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
			$('#user-name').html('');
	    }
	}
	
	function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response);
	    });
	}

	function displayUsername() {
		FB.api('/me', function(response) {
			console.log(response);
			$('#user-name').html(response.name);
		});
	}

	function ajaxSessionCall() {
		return $.ajax({
			url: config.DIR+'/sandbox/dy/get-fb-session.php',
			type: 'GET',
		});
	}

	function ajaxSessionCallback() {
		var ajax = ajaxSessionCall();

		ajax.done(function(response) {
			console.log('ajax response');
			console.log(response);
		});
	}



};