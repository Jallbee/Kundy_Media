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

function displayReviews() {
  var reviewsContainer = document.getElementById('reviews');
  reviews.forEach(function(review) {
    var card = document.createElement('div');
    card.classList.add('card');

    var productName = document.createElement('h2');
    productName.textContent = review.productName;
    card.appendChild(productName);

    var starRating = document.createElement('div');
    starRating.classList.add('star-rating');
    for (var i = 1; i <= 5; i++) {
      var star = document.createElement('span');
      star.classList.add('star');
      if (i <= review.rating) {
        star.classList.add('selected');
      }
      starRating.appendChild(star);
    }
    card.appendChild(starRating);

    var reviewText = document.createElement('p');
    reviewText.textContent = review.reviewText;
    card.appendChild(reviewText);

    var videoLink = document.createElement('a');
    videoLink.href = review.videoLink;
    videoLink.textContent = 'Watch Full Review';
    card.appendChild(videoLink);

    reviewsContainer.appendChild(card);
  });
}

window.onload = displayReviews;
