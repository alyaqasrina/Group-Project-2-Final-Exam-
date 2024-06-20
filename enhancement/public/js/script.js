// copy code of the day 
function copyCode() {
  var copyCode = document.getElementById("myInput");

  copyCode.select();
  copyCode.setSelectionRange(0, 99999);

  navigator.clipboard.writeText(copyCode.value);

  alert("Copied the text: " + copyCode.value);
}

// rating star
const ratingStars = [...document.getElementsByClassName("rating__star")];
const ratingResult = document.querySelector(".rating__result");

printRatingResult(ratingResult);

function executeRating(stars, result) {
  const starClassActive = "rating__star fas fa-star";
  const starClassUnactive = "rating__star far fa-star";
  const starsLength = stars.length;
  let i;
  stars.map((star) => {
    star.onclick = () => {
      i = stars.indexOf(star);

      if (star.className.indexOf(starClassUnactive) !== -1) {
        printRatingResult(result, i + 1);
        for (i; i >= 0; --i) stars[i].className = starClassActive;
      } else {
        printRatingResult(result, i);
        for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
      }
    };
  });
}

function printRatingResult(result, num = 0) {
  //result.textContent = `${num}/5`;
}

executeRating(ratingStars, ratingResult);

// form validation
const formName = document.getElementById('name');
const formEmail = document.getElementById('email');
const formComment = document.getElementById('comment');
const formFeedback = document.getElementById('formFeedback');

formFeedback.addEventListener('submit', (e) => {
  e.preventDefault();
  
  const name = formName.value.trim();
  const email = formEmail.value.trim();
  const comment = formComment.value.trim();
  const rating = document.querySelector('.rating__star.fas');

  if (!/^[a-zA-Z\s]+$/.test(name)) {
    alert('Name should contain only letters and spaces.');
    return;
  }

  if (!/\S+@\S+\.\S+/.test(email)) {
    alert('Please enter a valid email address.');
    return;
  }

  if (comment.length === 0) {
    alert('Comment cannot be empty.');
    return;
  }

  if (!rating) {
    alert('Please select a rating.');
    return;
  }

  alert('Thank you! Your feedback has been submitted');
  formName.value = '';
  formEmail.value = '';
  formComment.value = '';

  const starClassUnactive = "rating__star far fa-star";
  for (let i = 0; i < 5; i++) {
    ratingStars[i].className = starClassUnactive;
  }
});
