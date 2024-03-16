
var chatCollectionRef = db.collection("chats").doc(userPairId);

// Listen for real-time updates in the "messages" subcollection
chatCollectionRef.collection("messages")
  .orderBy("timestamp", "asc") // Optionally, you can order the messages by a timestamp or another field
  .onSnapshot(function (querySnapshot) {
    querySnapshot.docChanges().forEach(function (change) {
      if (change.type === "added") {
        // A new message was added
        const data = change.doc.data();
        
        // Create message elements
        const sent_receive_box = document.createElement("div");
        const msg_container = document.createElement("div");
        const p1 = document.createElement("p");
        const p2 = document.createElement("p");

        // Get the timestamp data
          
          const timestamp = data.timestamp;
          const date = timestamp.toDate();
          const formattedTime = date.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
        p2.className = "timestamp";
        p1.textContent = data.message;
        p2.textContent = formattedTime;
        
        msg_container.appendChild(p1);
        msg_container.appendChild(p2);

        sent_receive_box.appendChild(msg_container);

        // Assuming "ground" is the container for messages
        const ground = document.getElementById("ground");

        if (data.email == user1Id) {
          msg_container.className = "msg-content-right";
          sent_receive_box.className = "sent-text";
          p1.className = "sent";
        } else {
          msg_container.className = "msg-content-left";
          sent_receive_box.className = "received-text";
          p1.className = "received";
        }

        ground.appendChild(sent_receive_box);
        ground.scrollTop = ground.scrollHeight;

        console.log("email:", data.email);
        console.log("message:", data.message);
        console.log("time:", data.timestamp);
      }
      // Handle other change types (modified, removed) as needed
    });
  });