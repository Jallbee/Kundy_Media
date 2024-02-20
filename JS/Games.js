document.getElementById('gameForm').addEventListener('submit', function(event) {
            event.preventDefault(); 

            
            var gameName = document.getElementById('drinkName').value;
            var description = document.getElementById('description').value;

            
            var suggestionElement = document.createElement('div');
            suggestionElement.innerHTML = '<strong>' + gameName + '</strong>: ' + description;

            
            document.getElementById('suggestions').appendChild(suggestionElement);

            
            document.getElementById('gameForm').reset();
        });
