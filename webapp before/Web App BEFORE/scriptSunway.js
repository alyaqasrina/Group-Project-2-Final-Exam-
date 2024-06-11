// Sunway Lagoon Features Image Slideshow
const prevFirstSunway = document.getElementById('prev-sunway');
const nextFirstSunway = document.getElementById('next-sunway');
const featuresImagesFirstSlideSunway = document.getElementById('features-images-first-slide-sunway');

const imagesSunwayFirst = ['./imagesSunway/water_1.jpg', './imagesSunway/water_2.jpg', './imagesSunway/water_3.jpg'];

let firstSlideSunwayIndex = 0;
let canChangeFirstSunway = true; // New
let timeoutFirstSunway; // New

async function slideImagesSunwayFirst() {
	if (firstSlideSunwayIndex >= imagesSunwayFirst.length) {
		firstSlideSunwayIndex = 0;
	} else if (firstSlideSunwayIndex < 0) {
		firstSlideSunwayIndex = imagesSunwayFirst.length - 1;
	}

	featuresImagesFirstSlideSunway.style.opacity = '0.2'; // New
	featuresImagesFirstSlideSunway.style.scale = '0.5'; // New
	canChangeFirstSunway = false; // New

	timeoutFirstSunway = setTimeout(() => {
		featuresImagesFirstSlideSunway.src = imagesSunwayFirst[firstSlideSunwayIndex];
	}, 300);

	await FadeIn(featuresImagesFirstSlideSunway, timeoutFirstSunway); // New
	canChangeFirstSunway = true; // New
}

nextFirstSunway.addEventListener('click', async () => {
	if (canChangeFirstSunway) {
		firstSlideSunwayIndex++;
		await slideImagesSunwayFirst();
	}
});

prevFirstSunway.addEventListener('click', async () => {
	if (canChangeFirstSunway) {
		firstSlideSunwayIndex--;
		await slideImagesSunwayFirst();
	}
});

const prevSecondSunway = document.getElementById('prev2-sunway');
const nextSecondSunway = document.getElementById('next2-sunway');
const featuresImagesSecondSlideSunway = document.getElementById('features-images-second-slide-sunway');

const imagesSunwaySecond = ['./imagesSunway/xtreme_1.jpg', './imagesSunway/xtreme_2.jpg', './imagesSunway/xtreme_3.jpg'];

let secondSlideSunwayIndex = 0;
let canChangeSecondSunway = true; // New
let timeoutSecondSunway; // New

async function slideImagesSunwaySecond() {
	if (secondSlideSunwayIndex >= imagesSunwaySecond.length) {
		secondSlideSunwayIndex = 0;
	} else if (secondSlideSunwayIndex < 0) {
		secondSlideSunwayIndex = imagesSunwaySecond.length - 1;
	}

	featuresImagesSecondSlideSunway.style.opacity = '0.2'; // New
	featuresImagesSecondSlideSunway.style.scale = '0.5'; // New
	canChangeSecondSunway = false; // New

  timeoutSecondSunway = setTimeout(() => {
    featuresImagesSecondSlideSunway.src = imagesSunwaySecond[secondSlideSunwayIndex];
  }, 300);

  await FadeIn(featuresImagesSecondSlideSunway, timeoutSecondSunway); // New
  canChangeSecondSunway = true; // New
}

nextSecondSunway.addEventListener('click', async () => {
if (canChangeSecondSunway) {
    secondSlideSunwayIndex++;
    await slideImagesSunwaySecond();
}
});

prevSecondSunway.addEventListener('click', async () => {
if (canChangeSecondSunway) {
    secondSlideSunwayIndex--;
    slideImagesSunwaySecond();
}
});

const prevThirdSunway = document.getElementById('prev3-sunway');
const nextThirdSunway = document.getElementById('next3-sunway');
const featuresImagesThirdSlideSunway = document.getElementById('features-images-third-slide-sunway');

const imagesSunwayThird = ['./imagesSunway/scream_1.jpg', './imagesSunway/scream_4.jpg', './imagesSunway/scream_5.jpg'];

let thirdSlideSunwayIndex = 0;
let canChangeThirdSunway = true; // New
let timeoutThirdSunway; // New

async function slideImagesSunwayThird() {
if (thirdSlideSunwayIndex >= imagesSunwayThird.length) {
    thirdSlideSunwayIndex = 0;
} else if (thirdSlideSunwayIndex < 0) {
    thirdSlideSunwayIndex = imagesSunwayThird.length - 1;
}

featuresImagesThirdSlideSunway.style.opacity = '0.2'; // New
featuresImagesThirdSlideSunway.style.scale = '0.5'; // New
canChangeThirdSunway = false; // New

timeoutThirdSunway = setTimeout(() => {
    featuresImagesThirdSlideSunway.src = imagesSunwayThird[thirdSlideSunwayIndex];
}, 300);

await FadeIn(featuresImagesThirdSlideSunway, timeoutThirdSunway); // New
	canChangeThirdSunway = true; // New

canChangeThirdSunway = true; // New
}

nextThirdSunway.addEventListener('click', async () => {
if (canChangeThirdSunway) {
    thirdSlideSunwayIndex++;
    slideImagesSunwayThird();
}
});

prevThirdSunway.addEventListener('click', async () => {
if (canChangeThirdSunway) {
    thirdSlideSunwayIndex--;
    slideImagesSunwayThird();
}
});

// Sunway Lagoon Our Review Image Slideshow
const prevReview = document.getElementById('prevButton');
const nextReview = document.getElementById('nextButton');
const reviewImagesFirstSlide = document.getElementById('review-images-first-slide');

const imagesReviewFirst = ['./imagesSunway/sunway_review_1.jpg', './imagesSunway/sunway_review_2.jpg', './imagesSunway/sunway_review_3.jpg'];

let firstSlideReviewIndex = 0;
let canChangeReviewSunway = true; // New
let timeoutReviewSunway; // New

async function slideImagesReviewFirst() {
if (firstSlideReviewIndex >= imagesReviewFirst.length) {
    firstSlideReviewIndex = 0;
} else if (firstSlideReviewIndex < 0) {
    firstSlideReviewIndex = imagesReviewFirst.length - 1;
}

reviewImagesFirstSlide.style.opacity = '0.2'; // New
reviewImagesFirstSlide.style.scale = '0.5'; // New
canChangeReviewSunway = false; // New

timeoutReviewSunway = setTimeout(() => {
    reviewImagesFirstSlide.src = imagesReviewFirst[firstSlideReviewIndex];
}, 300);

await FadeIn(reviewImagesFirstSlide, timeoutReviewSunway); // New
canChangeReviewSunway = true; // New
}

nextReview.addEventListener('click', async () => {
if (canChangeReviewSunway) {
    firstSlideReviewIndex++;
    slideImagesReviewFirst();
}
});

prevReview.addEventListener('click', async () => {
if (canChangeReviewSunway) {
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
