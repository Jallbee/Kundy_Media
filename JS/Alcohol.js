var reviews = [
  {
    productName: "Collective arts complementary colors sour ale",
    rating: 3,
    reviewText: "",
    videoLink: "https://www.tiktok.com/@kundymedia/video/7258659555532361003"
  },
  {
    productName: "1911 maple buron barrel",
    rating: 4,
    reviewText: "",
    videoLink: "https://www.tiktok.com/@kundymedia/video/7051726088459783471"
  },
  {
    productName: "1911 candy corn",
    rating: 3,
    reviewText: "",
    videoLink: "https://www.tiktok.com/@kundymedia/video/7310373631433985323"
  },
  {
    productName: "Mortalis and Spanish Marie Hydralisk",
    rating: 3,
    reviewText: "",
    videoLink: "https://www.tiktok.com/@kundymedia/video/7294662522064440619"
  },
  {
    productName: "450 North Mega Ghost",
    rating: 3,
    reviewText: "",
    videoLink: "https://www.tiktok.com/@kundymedia/video/7309912314038406446"
  }
];

$(document).ready(function() {
  function displayReviews() {
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

  displayReviews();

  $('#drinkForm').submit(function(event) {
    event.preventDefault();

    var drinkName = $('#drinkName').val();
    var description = $('#description').val();

    var suggestionElement = $('<div>').html('<strong>' + drinkName + '</strong>: ' + description);

    $('#suggestions').append(suggestionElement);

    $('#drinkForm').trigger('reset');
  });
});