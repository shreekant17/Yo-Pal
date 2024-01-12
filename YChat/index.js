
// Initialize Firebase with your Firebase config


var firebaseConfig = {
    apiKey: "AIzaSyCsnb39vMV3RtZ6Idn5eLM-MSj0EtNr9PA",
    authDomain: "y-chat-9a8cb.firebaseapp.com",
    projectId: "y-chat-9a8cb",
    storageBucket: "y-chat-9a8cb.appspot.com",
    messagingSenderId: "701312386297",
    appId: "1:701312386297:web:e3d613e9789d8e1b758e28",
};

firebase.initializeApp(firebaseConfig);


// Get a reference to the Firestore database
var db = firebase.firestore();

let chatListener = null;
let lastChatListener = null;

let last_listener = null;

let newListener = null;

let messegesCollection = null;





