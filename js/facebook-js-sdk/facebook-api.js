/* Facebook API Library*/
// console.log('Facebook API Library');

var facebook = window.facebook || {};

facebook.init = function(appInfo) {
	console.log('called facebook.init()...');

	window.fbAsyncInit = function() {
		FB.init({
			appId      : appInfo.appID, //608964315890524
			cookie     : true,  // enable cookies to allow the server to access 
			                    // the session
			xfbml      : true,  // parse social plugins on this page
			version    : 'v2.1' // use version 2.1
		});

		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		});

	};

	console.log(appInfo.appID);
	console.log(appInfo.msg);

	function statusChangeCallback(response) {
	    console.log('statusChangeCallback');
	    console.log(response);
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      testAPI();
	    } else if (response.status === 'not_authorized') {
	      // The person is logged into Facebook, but not your app.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into this app.';
	    } else {
	      // The person is not logged into Facebook, so we're not sure if
	      // they are logged into this app or not.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into Facebook.';
	    }
	}
	
	function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	  // Here we run a very simple test of the Graph API after login is
	  // successful.  See statusChangeCallback() for when this call is made.
	  function testAPI() {
	    console.log('Welcome!  Fetching your information.... ');
	    FB.api('/me', function(response) {
	      console.log('Successful login for: ' + response.name);
	      document.getElementById('status').innerHTML =
	        'Thanks for logging in, ' + response.name + '!';
	    });
	  }

	  // function eoPage() {
	  //   FB.api('/Emblemobjects?access_token=218952278313886|V9ctcJXDHttIku4J7cv60N2dMZk', function(response) {
	  //     console.log("random page");
	  //     console.log(response);
	  //   });
	  // }

	  // function tcPage() {
	  //   FB.api('/dctestcause/posts?access_token=218952278313886|V9ctcJXDHttIku4J7cv60N2dMZk', function(response) {
	  //     console.log("random page");
	  //     console.log(response);
	  //   });
	  // }
};