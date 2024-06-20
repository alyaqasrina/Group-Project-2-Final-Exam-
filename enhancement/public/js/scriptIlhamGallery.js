// Ilham Gallery Features Image Slideshow
const prevFirstIg = document.getElementById('prev-ig');
const nextFirstIg = document.getElementById('next-ig');
const featuresImagesFirstSlideIg = document.getElementById('features-images-first-slide-ig');

const imagesIgFirst = ['/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/Exhibitions1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/Exhibitions2.png'];

let firstSlideIgIndex = 0;
let canChangeFirstIg = true; // New
let timeoutFirstIg; // New

async function slideImagesIgFirst() {
  if (firstSlideIgIndex >= imagesIgFirst.length) {
    firstSlideIgIndex = 0;
  } else if (firstSlideIgIndex < 0) {
    firstSlideIgIndex = imagesIgFirst.length - 1;
  }

  featuresImagesFirstSlideIg.style.opacity = '0.2'; // New
  featuresImagesFirstSlideIg.style.scale = '0.5'; // New
  canChangeFirstIg = false; // New

  timeoutFirstIg = setTimeout(() => {
    featuresImagesFirstSlideIg.src = imagesIgFirst[firstSlideIgIndex];
  }, 300);

  await FadeIn(featuresImagesFirstSlideIg, timeoutFirstIg); // New
  canChangeFirstIg = true; // New
}

nextFirstIg.addEventListener('click', async () => {
  if (canChangeFirstIg) {
    firstSlideIgIndex++;
    await slideImagesIgFirst();
  }
});

prevFirstIg.addEventListener('click', async () => {
  if (canChangeFirstIg) {
    firstSlideIgIndex--;
    slideImagesIgFirst();
  }
});

const prevSecondIg = document.getElementById('prev2-ig');
const nextSecondIg = document.getElementById('next2-ig');
const featuresImagesSecondSlideIg = document.getElementById('features-images-second-slide-ig');

const imagesIgSecond = ['/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/pastExhibitions1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/pastExhibitions2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/pastExhibitions3.png'];

let secondSlideIgIndex = 0;
let canChangeSecondIg = true; // New
let timeoutSecondIg; // New

async function slideImagesIgSecond() {
  if (secondSlideIgIndex >= imagesIgSecond.length) {
    secondSlideIgIndex = 0;
  } else if (secondSlideIgIndex < 0) {
    secondSlideIgIndex = imagesIgSecond.length - 1;
  }

  featuresImagesSecondSlideIg.style.opacity = '0.2'; // New
  featuresImagesSecondSlideIg.style.scale = '0.5'; // New
  canChangeSecondIg = false; // New

  timeoutSecondIg = setTimeout(() => {
    featuresImagesSecondSlideIg.src = imagesIgSecond[secondSlideIgIndex];
  }, 300);

  await FadeIn(featuresImagesSecondSlideIg, timeoutSecondIg); // New
  canChangeSecondIg = true; // New
}

nextSecondIg.addEventListener('click', async () => {
  if (canChangeSecondIg) {
    secondSlideIgIndex++;
    slideImagesIgSecond();
  }
});

prevSecondIg.addEventListener('click', async () => {
  if (canChangeSecondIg) {
    secondSlideIgIndex--;
    slideImagesIgSecond();
  }
});

const prevThirdIg = document.getElementById('prev3-ig');
const nextThirdIg = document.getElementById('next3-ig');
const featuresImagesThirdSlideIg = document.getElementById('features-images-third-slide-ig');

const imagesIgThird = ['/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/Artwork1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/Artwork2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/Artwork3.png'];

let thirdSlideIgIndex = 0;
let canChangeThirdIg = true; // New
let timeoutThirdIg; // New

async function slideImagesIgThird() {
  if (thirdSlideIgIndex >= imagesIgThird.length) {
    thirdSlideIgIndex = 0;
  } else if (thirdSlideIgIndex < 0) {
    thirdSlideIgIndex = imagesIgThird.length - 1;
  }

  featuresImagesThirdSlideIg.style.opacity = '0.2'; // New
  featuresImagesThirdSlideIg.style.scale = '0.5'; // New
  canChangeThirdIg = false; // New

  timeoutThirdIg = setTimeout(() => {
    featuresImagesThirdSlideIg.src = imagesIgThird[thirdSlideIgIndex];
  }, 300);

  await FadeIn(featuresImagesThirdSlideIg, timeoutThirdIg); // New
  canChangeThirdIg = true; // New
}

nextThirdIg.addEventListener('click', async () => {
  if (canChangeThirdIg) {
    thirdSlideIgIndex++;
    slideImagesIgThird();
  }
});

prevThirdIg.addEventListener('click', async () => {
  if (canChangeThirdIg) {
    thirdSlideIgIndex--;
    slideImagesIgThird();
  }
});

// Ilham Gallery Our Review Image Slideshow
const prevReview = document.getElementById('prevButton');
const nextReview = document.getElementById('nextButton');
const reviewImagesFirstSlide = document.getElementById('review-images-first-slide');

const imagesReviewFirst = ['/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/ReviewIg1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/ReviewIg2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/ilhamGallery/ReviewIg3.png'];

let firstSlideReviewIndex = 0;
let canChangeReviewIg = true; // New
let timeoutReviewIg; // New

async function slideImagesReviewFirst() {
  if (firstSlideReviewIndex >= imagesReviewFirst.length) {
    firstSlideReviewIndex = 0;
  } else if (firstSlideReviewIndex < 0) {
    firstSlideReviewIndex = imagesReviewFirst.length - 1;
  }

  reviewImagesFirstSlide.style.opacity = '0.2'; // New
  reviewImagesFirstSlide.style.scale = '0.5'; // New
  canChangeReviewIg = false; // New

  timeoutReviewIg = setTimeout(() => {
    reviewImagesFirstSlide.src = imagesReviewFirst[firstSlideReviewIndex];
  }, 300);

  await FadeIn(reviewImagesFirstSlide, timeoutReviewIg); // New
  canChangeReviewIg = true; // New
}

nextReview.addEventListener('click', async () => {
  if (canChangeReviewIg) {
    firstSlideReviewIndex++;
    slideImagesReviewFirst();
  }
});

prevReview.addEventListener('click', async () => {
  if (canChangeReviewIg) {
    firstSlideReviewIndex--;
    slideImagesReviewFirst();
  }
});

// Code for the day copy to clipboard
const code = document.getElementById('code-for-today')

code.addEventListener('click', () => {
  navigator.clipboard.writeText(code.innerHTML)

  alert("Yeay! You have successfully copied the code. (*^▽^*)");
})

// Fade Functions // New
async function FadeIn(param, timeout) {
  setTimeout(() => {
    param.style.opacity = '1';
    param.style.scale = '1';
    clearTimeout(timeout);
  }, 300); // 1000 is 1 second
}