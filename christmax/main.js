var myArray = ["card1", "card2", "card3"];
var randomIndex = Math.floor(Math.random() * myArray.length);
var randomElement = myArray[randomIndex];
var card = document.getElementById(randomElement);
var container = document.getElementById("christmas-cards-container");
container.style.display = "block";
card.style.display = "block";
