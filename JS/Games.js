document.addEventListener('DOMContentLoaded', function() {
  fetchAndDisplayReviews();
  
  document.getElementById('gameForm').addEventListener('submit', function(event) {
    event.preventDefault();
    addGameSuggestion();
  });
});

function fetchAndDisplayReviews() {
  fetch('greviews.xml')
  .then(response => {
    
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(data => {
      var parser = new DOMParser();
      var xmlDoc = parser.parseFromString(data, 'text/xml');
      displayReviews(xmlDoc);
    })
    .catch(error => console.error('Error fetching XML:', error));
}

function displayReviews(xml) {
  if (xml) {
    var reviews = xml.getElementsByTagName("review");
    var html = "";
    for (var i = 0; i < reviews.length; i++) {
      var title = reviews[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
      var rating = reviews[i].getElementsByTagName("rating")[0].childNodes[0].nodeValue;
      var author = reviews[i].getElementsByTagName("author")[0].childNodes[0].nodeValue;
      var content = reviews[i].getElementsByTagName("content")[0].childNodes[0].nodeValue;
      html += "<div>";
      html += "<h2>" + title + "</h2>";
      html += "<p><strong>Rating:</strong> " + rating + "</p>";
      html += "<p><strong>Author:</strong> " + author + "</p>";
      html += "<p>" + content + "</p>";
      html += "</div>";
    }
    document.getElementById("reviews").innerHTML = html;
  } else {
    console.error('XML data is null or undefined');
  }
}
  
function addGameSuggestion() {
  var gameName = document.getElementById('gameName').value;
  var description = document.getElementById('description').value;

  if (!gameName || !description) {
    alert("Please enter both game name and description.");
    return;
  }

  var suggestionElement = document.createElement('div');
  suggestionElement.innerHTML = '<strong>' + gameName + '</strong>: ' + description;

  document.getElementById('suggestions').appendChild(suggestionElement);

  document.getElementById('gameForm').reset();
}


function fetchAndDisplayReviews() {
  fetch('greviews.xml')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(data => {
      console.log('Received data:', data); // Log the received data
      var parser = new DOMParser();
      var xmlDoc = parser.parseFromString(data, 'text/xml');
      displayReviews(xmlDoc);
    })
    .catch(error => console.error('Error fetching XML:', error));
}