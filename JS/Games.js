 function loadReviews() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            displayReviews(this);
        }
    };
    xhttp.open("GET", "game_reviews.xml", true);
    xhttp.send();
}

function displayReviews(xml) {
    if (xml && xml.responseXML) {
        var xmlDoc = xml.responseXML;
        var reviews = xmlDoc.getElementsByTagName("review");
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
  
window.onload = function loadReviews() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            displayReviews(this);
        }
    };
    xhttp.open("GET", "game_reviews.xml", true);
    xhttp.send();
    
    console.log('Request sent');

document.getElementById('gameForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var gameName = document.getElementById('gameName').value;
    var description = document.getElementById('description').value;

    var suggestionElement = document.createElement('div');
    suggestionElement.innerHTML = '<strong>' + gameName + '</strong>: ' + description;

    document.getElementById('suggestions').appendChild(suggestionElement);

    document.getElementById('gameForm').reset();
});
