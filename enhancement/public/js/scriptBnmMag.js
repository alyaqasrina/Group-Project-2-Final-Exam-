// BNM MAG Features Image Slideshow
const prevFirstBm = document.getElementById('prev-bm');
const nextFirstBm = document.getElementById('next-bm');
const featuresImagesFirstSlideBm = document.getElementById('features-images-first-slide-bm');

const imagesBmFirst = ['/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/gallery1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/gallery2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/gallery3.png'];

let firstSlideBmIndex = 0;
let canChangeFirstBm = true; // New
let timeoutFirstBm; // New

async function slideImagesBmFirst() {
  if (firstSlideBmIndex >= imagesBmFirst.length) {
    firstSlideBmIndex = 0;
  } else if (firstSlideBmIndex < 0) {
    firstSlideBmIndex = imagesBmFirst.length - 1;
  }

  featuresImagesFirstSlideBm.style.opacity = '0.2'; // New
  featuresImagesFirstSlideBm.style.scale = '0.5'; // New
  canChangeFirstBm = false; // New

  timeoutFirstBm = setTimeout(() => {
    featuresImagesFirstSlideBm.src = imagesBmFirst[firstSlideBmIndex];
  }, 300);

  await FadeIn(featuresImagesFirstSlideBm, timeoutFirstBm); // New
  canChangeFirstBm = true; // New
}

nextFirstBm.addEventListener('click', async () => {
  if (canChangeFirstBm) {
    firstSlideBmIndex++;
    await slideImagesBmFirst();
  }
});

prevFirstBm.addEventListener('click', async () => {
  if (canChangeFirstBm) {
    firstSlideBmIndex--;
    slideImagesFbFirst();
  }
});

const prevSecondBm = document.getElementById('prev2-bm');
const nextSecondBm = document.getElementById('next2-bm');
const featuresImagesSecondSlideBm = document.getElementById('features-images-second-slide-bm');

const imagesBmSecond = ['/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/programme1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/programme2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/programme3.png'];

let secondSlideBmIndex = 0;
let canChangeSecondBm = true; // New
let timeoutSecondBm; // New

async function slideImagesBmSecond() {
  if (secondSlideBmIndex >= imagesBmSecond.length) {
    secondSlideBmIndex = 0;
  } else if (secondSlideBmIndex < 0) {
    secondSlideBmIndex = imagesBmSecond.length - 1;
  }

  featuresImagesSecondSlideBm.style.opacity = '0.2'; // New
  featuresImagesSecondSlideBm.style.scale = '0.5'; // New
  canChangeSecondBm = false; // New

  timeoutSecondBm = setTimeout(() => {
    featuresImagesSecondSlideBm.src = imagesBmSecond[secondSlideBmIndex];
  }, 300);

  await FadeIn(featuresImagesSecondSlideBm, timeoutSecondBm); // New
  canChangeSecondBm = true; // New
}

nextSecondBm.addEventListener('click', async () => {
  if (canChangeSecondBm) {
    secondSlideBmIndex++;
    slideImagesBmSecond();
  }
});

prevSecondBm.addEventListener('click', async () => {
  if (canChangeSecondBm) {
    secondSlideBmIndex--;
    slideImagesBmSecond();
  }
});

const prevThirdBm = document.getElementById('prev3-bm');
const nextThirdBm = document.getElementById('next3-bm');
const featuresImagesThirdSlideBm = document.getElementById('features-images-third-slide-bm');

const imagesBmThird = ['/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/ArtCollection1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/ArtCollection2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/ArtCollection3.png'];

let thirdSlideBmIndex = 0;
let canChangeThirdBm = true; // New
let timeoutThirdBm; // New

async function slideImagesBmThird() {
  if (thirdSlideBmIndex >= imagesBmThird.length) {
    thirdSlideBmIndex = 0;
  } else if (thirdSlideBmIndex < 0) {
    thirdSlideBmIndex = imagesBmThird.length - 1;
  }

  featuresImagesThirdSlideBm.style.opacity = '0.2'; // New
  featuresImagesThirdSlideBm.style.scale = '0.5'; // New
  canChangeThirdBm = false; // New

  timeoutThirdBm = setTimeout(() => {
    featuresImagesThirdSlideBm.src = imagesBmThird[thirdSlideBmIndex];
  }, 300);

  await FadeIn(featuresImagesThirdSlideBm, timeoutThirdBm); // New
  canChangeThirdBm = true; // New
}

nextThirdBm.addEventListener('click', async () => {
  if (canChangeThirdBm) {
    thirdSlideBmIndex++;
    slideImagesBmThird();
  }
});

prevThirdBm.addEventListener('click', async () => {
  if (canChangeThirdBm) {
    thirdSlideBmIndex--;
    slideImagesBmThird();
  }
});

// BNM MAG Our Review Image Slideshow
const prevReview = document.getElementById('prevButton');
const nextReview = document.getElementById('nextButton');
const reviewImagesFirstSlide = document.getElementById('review-images-first-slide');

const imagesReviewFirst = ['/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/Reviewbm1.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/Reviewbm2.png', '/Group-Project-2-Final-Exam-/enhancement/media2/bnmMag/Reviewbm3.png'];

let firstSlideReviewIndex = 0;
let canChangeReviewBm = true; // New
let timeoutReviewBm; // New

async function slideImagesReviewFirst() {
  if (firstSlideReviewIndex >= imagesReviewFirst.length) {
    firstSlideReviewIndex = 0;
  } else if (firstSlideReviewIndex < 0) {
    firstSlideReviewIndex = imagesReviewFirst.length - 1;
  }

  reviewImagesFirstSlide.style.opacity = '0.2'; // New
  reviewImagesFirstSlide.style.scale = '0.5'; // New
  canChangeReviewBm = false; // New

  timeoutReviewBm = setTimeout(() => {
    reviewImagesFirstSlide.src = imagesReviewFirst[firstSlideReviewIndex];
  }, 300);

  await FadeIn(reviewImagesFirstSlide, timeoutReviewBm); // New
  canChangeReviewBm = true; // New
}

nextReview.addEventListener('click', async () => {
  if (canChangeReviewBm) {
    firstSlideReviewIndex++;
    slideImagesReviewFirst();
  }
});

prevReview.addEventListener('click', async () => {
  if (canChangeReviewBm) {
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