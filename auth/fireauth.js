const firebaseConfig = {
      apiKey: "AIzaSyBau59dq1OMO9pqEgiK7N7U3c654nv7aYg",
      authDomain: "yo-pal.firebaseapp.com",
      databaseURL: "https://yo-pal-default-rtdb.firebaseio.com",
      projectId: "yo-pal",
      storageBucket: "yo-pal.appspot.com",
      messagingSenderId: "873083730372",
      appId: "1:873083730372:web:e1219132554149fbd70c91",
      measurementId: "G-0R8B1Q84R5"
    };

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const googleSignInBtn = document.getElementById('continue_with_google');
const emailbox = document.getElementById('email');
const loginForm = document.getElementById('login-form');



googleSignInBtn.addEventListener('click', () => {
    
 
  const provider = new firebase.auth.GoogleAuthProvider();


  firebase.auth()
    .signInWithPopup(provider)
    .then((result) => {
      // User signed in using Google
      const user = result.user;
      const emailid = user.email;
      emailbox.value = emailid;
      loginForm.action = "firelogin.php";
      loginForm.submit();
      
       // window.location.href = 'firelogin.php';
    })
    .catch((error) => {
      // Handle errors
      console.error('Google sign-in error:', error);
    });
});


  
  const googleSignInBtn2 = document.getElementById('continue_with_google2');
  const emailbox2 = document.getElementById('email2');
  const signinForm = document.getElementById('signin-form');
  const fname = document.getElementById("fname");
  const lname = document.getElementById("lname");
  //const dob = document.getElementById("dob");
  
  
const register = () => {
  const provider = new firebase.auth.GoogleAuthProvider();
  //provider.addScope('https://www.googleapis.com/auth/user.birthday.read');
      //provider.addScope('openid profile email https://www.googleapis.com/auth/user.birthday.read');
    
      firebase.auth()
        .signInWithPopup(provider)
        .then((result) => {
          // User signed in using Google
          const user = result.user;
          const emailid = user.email;
          emailbox2.value = emailid;
          const firstName = user.displayName.split(' ')[0];
          const lastName = user.displayName.split(' ').slice(1).join(' ');
        //const dateOfBirth = user.additionalUserInfo.profile.birthday;
          
          fname.value = firstName;
          lname.value = lastName;
          //dob.value = dateOfBirth;
          
          signinForm.action = "fireregister.php";
          signinForm.submit();
        
        })
        .catch((error) => {
          // Handle errors
          console.error('Google sign-in error:', error);
        });
}


  googleSignInBtn2.addEventListener('click', () => {
    register();
    });

