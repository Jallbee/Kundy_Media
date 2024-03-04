  $(document).ready(function() {
                function displayReviews(reviews) {
                    var reviewsContainer = $('#reviews');
                    reviews.forEach(function(review) {
                        var card = $('<div>').addClass('card');

                        var productName = $('<h2>').text(review.productName);
                        card.append(productName);

                        var starRating = $('<div>').addClass('star-rating');
                        for (var i = 1; i <= 5; i++) {
                            var star = $('<span>').addClass('star');
                            if (i <= review.rating) {
                                star.addClass('selected');
                            }
                            starRating.append(star);
                        }
                        card.append(starRating);

                        var reviewText = $('<p>').text(review.reviewText);
                        card.append(reviewText);

                        var videoLink = $('<a>').attr('href', review.videoLink).text('Watch Full Review');
                        card.append(videoLink);

                        reviewsContainer.append(card);
                    });
                }

                
                $.ajax({
                    url: 'reviews.json', 
                    method: 'GET',
                    dataType: 'json',
                    success: function(reviews) {
                        displayReviews(reviews);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching reviews:', error);
                    }
                });

                $('#drinkForm').submit(function(event) {
                    event.preventDefault();

                    var drinkName = $('#drinkName').val();
                    var description = $('#description').val();

                    var suggestionElement = $('<div>').html('<strong>' + drinkName + '</strong>: ' + description);

                    $('#suggestions').append(suggestionElement);

                    $('#drinkForm').trigger('reset');
                });
            });
     