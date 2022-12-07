

const firebaseConfig = {
    apiKey: "AIzaSyBHU34QXEGueJdBzq53xqKGZCLJk7fZU8U",
    authDomain: "ckcsocialnetwork-7c8ee.firebaseapp.com",
    projectId: "ckcsocialnetwork-7c8ee",
    storageBucket: "ckcsocialnetwork-7c8ee.appspot.com",
    messagingSenderId: "1007525917985",
    appId: "1:1007525917985:web:3f835d407944c0d3f73a60",
    measurementId: "G-RDZGXFJV7C"
  }
  var defaultAppname = firebase.initializeApp(firebaseConfig);
  console.log(defaultAppname.name);
  var URL = $('meta[name="baseURL"]').attr('content');

  console.log("Firebase started.");

  var provider = new firebase.auth.GoogleAuthProvider();
provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
// firebase.auth().languageCode = 'it';
provider.setCustomParameters({
  'login_hint': 'user@example.com'
});


  firebase.auth()
  .getRedirectResult()
  .then((result) => {
    if (result.credential) {
      /** @type {firebase.auth.OAuthCredential} */
      var credential = result.credential;

      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = credential.accessToken;
      // ...
    }
    // The signed-in user info.
    var user = result.user;
    console.log(user.uid, token);
    
  }).catch((error) => {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
  });