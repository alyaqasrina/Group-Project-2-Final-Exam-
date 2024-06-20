// Rollerwa Features Image Slideshow
const prevFirstRollerwa = document.getElementById('prev-rollerwa');
const nextFirstRollerwa = document.getElementById('next-rollerwa');
const featuresImagesFirstSlideRollerwa = document.getElementById('features-images-first-slide-rollerwa');

const imagesRollerwaFirst = ['/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_4.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_5.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_1.jpg'];

let firstSlideRollerwaIndex = 0;
let canChangeFirstRollerwa = true; // New
let timeoutFirstRollerwa; // New

async function slideImagesRollerwaFirst() {
	if (firstSlideRollerwaIndex >= imagesRollerwaFirst.length) {
		firstSlideRollerwaIndex = 0;
	} else if (firstSlideRollerwaIndex < 0) {
		firstSlideRollerwaIndex = imagesRollerwaFirst.length - 1;
	}

	featuresImagesFirstSlideRollerwa.style.opacity = '0.2'; // New
	featuresImagesFirstSlideRollerwa.style.scale = '0.5'; // New
	canChangeFirstRollerwa = false; // New

	timeoutFirstRollerwa = setTimeout(() => {
		featuresImagesFirstSlideRollerwa.src = imagesRollerwaFirst[firstSlideRollerwaIndex];
	}, 300);

	await FadeIn(featuresImagesFirstSlideRollerwa, timeoutFirstRollerwa); // New
	canChangeFirstRollerwa = true; // New
}

nextFirstRollerwa.addEventListener('click', async () => {
	if (canChangeFirstRollerwa) {
		firstSlideRollerwaIndex++;
		await slideImagesRollerwaFirst();
	}
});

prevFirstRollerwa.addEventListener('click', async () => {
	if (canChangeFirstRollerwa) {
		firstSlideRollerwaIndex--;
		slideImagesRollerwaFirst();
	}
});

const prevSecondRollerwa = document.getElementById('prev2-rollerwa');
const nextSecondRollerwa = document.getElementById('next2-rollerwa');
const featuresImagesSecondSlideRollerwa = document.getElementById('features-images-second-slide-rollerwa');

const imagesRollerwaSecond = ['/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_12.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_3.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_14.jpg'];

let secondSlideRollerwaIndex = 0;
let canChangeSecondRollerwa = true; // New
let timeoutSecondRollerwa; // New

async function slideImagesRollerwaSecond() {
	if (secondSlideRollerwaIndex >= imagesRollerwaSecond.length) {
		secondSlideRollerwaIndex = 0;
	} else if (secondSlideRollerwaIndex < 0) {
		secondSlideRollerwaIndex = imagesRollerwaSecond.length - 1;
	}

	featuresImagesSecondSlideRollerwa.style.opacity = '0.2'; // New
	featuresImagesSecondSlideRollerwa.style.scale = '0.5'; // New
	canChangeSecondRollerwa = false; // New
  
  timeoutSecondRollerwa = setTimeout(() => {
      featuresImagesSecondSlideRollerwa.src = imagesRollerwaSecond[secondSlideRollerwaIndex];
  }, 300);
  
  await FadeIn(featuresImagesSecondSlideRollerwa, timeoutSecondRollerwa); // New
  canChangeSecondRollerwa = true; // New
}


nextSecondRollerwa.addEventListener('click', async () => {
if (canChangeSecondRollerwa) {
    secondSlideRollerwaIndex++;
    slideImagesRollerwaSecond();
}
});

prevSecondRollerwa.addEventListener('click', async () => {
if (canChangeSecondRollerwaRollerwa) {
    secondSlideRollerwaIndex--;
    slideImagesRollerwaSecond();
}
});

const prevThirdRollerwa = document.getElementById('prev3-rollerwa');
const nextThirdRollerwa = document.getElementById('next3-rollerwa');
const featuresImagesThirdSlideRollerwa = document.getElementById('features-images-third-slide-rollerwa');

const imagesRollerwaThird = ['/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_15.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_9.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/feature_11.jpg'];

let thirdSlideRollerwaIndex = 0;
let canChangeThirdRollerwa = true; // New
let timeoutThirdRollerwa; // New

async function slideImagesRollerwaThird() {
if (thirdSlideRollerwaIndex >= imagesRollerwaThird.length) {
    thirdSlideRollerwaIndex = 0;
} else if (thirdSlideRollerwaIndex < 0) {
    thirdSlideRollerwayIndex = imagesRollerwaThird.length - 1;
}

featuresImagesThirdSlideRollerwa.style.opacity = '0.2'; // New
featuresImagesThirdSlideRollerwa.style.scale = '0.5'; // New
canChangeThirdRollerwa = false; // New

timeoutThirdRollerwa = setTimeout(() => {
    featuresImagesThirdSlideRollerwa.src = imagesRollerwaThird[thirdSlideRollerwaIndex];
}, 300);

await FadeIn(featuresImagesThirdSlideRollerwa, timeoutThirdRollerwa); // New
	canChangeThirdRollerwa = true; // New

canChangeThirdRollerwa = true; // New
}

nextThirdRollerwa.addEventListener('click', async () => {
if (canChangeThirdRollerwa) {
    thirdSlideRollerwaIndex++;
    slideImagesRollerwaThird();
}
});

prevThirdRollerwa.addEventListener('click', async () => {
if (canChangeThirdRollerwa) {
    thirdSlideRollerwaIndex--;
    slideImagesRollerwaThird();
}
});

// Rollerwa Our Review Image Slideshow
const prevReview = document.getElementById('prevButton');
const nextReview = document.getElementById('nextButton');
const reviewImagesFirstSlide = document.getElementById('review-images-first-slide');

const imagesReviewFirst = ['/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/review_1_r.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/review_2_e.jpg', '/Group-Project-2-Final-Exam-/enhancement/imagesRollerwa/review_3_R.jpg'];

let firstSlideReviewIndex = 0;
let canChangeReviewRollerwa = true; // New
let timeoutReviewRollerwa; // New

async function slideImagesReviewFirst() {
if (firstSlideReviewIndex >= imagesReviewFirst.length) {
    firstSlideReviewIndex = 0;
} else if (firstSlideReviewIndex < 0) {
    firstSlideReviewIndex = imagesReviewFirst.length - 1;
}

reviewImagesFirstSlide.style.opacity = '0.2'; // New
reviewImagesFirstSlide.style.scale = '0.5'; // New
canChangeReviewRollerwa = false; // New

timeoutReviewRollerwa = setTimeout(() => {
    reviewImagesFirstSlide.src = imagesReviewFirst[firstSlideReviewIndex];
}, 300);

await FadeIn(reviewImagesFirstSlide, timeoutReviewRollerwa); // New
canChangeReviewRollerwa = true; // New
}

nextReview.addEventListener('click', async () => {
if (canChangeReviewRollerwa) {
    firstSlideReviewIndex++;
    slideImagesReviewFirst();
}
});

prevReview.addEventListener('click', async () => {
if (canChangeReviewRollerwa) {
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
