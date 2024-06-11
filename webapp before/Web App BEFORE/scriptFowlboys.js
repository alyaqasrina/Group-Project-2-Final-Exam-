// Fowlboys Features Image Slideshow
const prevFirstFb = document.getElementById('prev-fb');
const nextFirstFb = document.getElementById('next-fb');
const featuresImagesFirstSlideFb = document.getElementById('features-images-first-slide-fb');

const imagesFbFirst = ['./media/food4.jpg', './media/food5.jpg', './media/food6.jpeg'];

let firstSlideFbIndex = 0;
let canChangeFirstFb = true; // New
let timeoutFirstFb; // New

async function slideImagesFbFirst() {
	if (firstSlideFbIndex >= imagesFbFirst.length) {
		firstSlideFbIndex = 0;
	} else if (firstSlideFbIndex < 0) {
		firstSlideFbIndex = imagesFbFirst.length - 1;
	}

	featuresImagesFirstSlideFb.style.opacity = '0.2'; // New
	featuresImagesFirstSlideFb.style.scale = '0.5'; // New
	canChangeFirstFb = false; // New

	timeoutFirstFb = setTimeout(() => {
		featuresImagesFirstSlideFb.src = imagesFbFirst[firstSlideFbIndex];
	}, 300);

	await FadeIn(featuresImagesFirstSlideFb, timeoutFirstFb); // New
	canChangeFirstFb = true; // New
}

nextFirstFb.addEventListener('click', async () => {
	if (canChangeFirstFb) {
		firstSlideFbIndex++;
		await slideImagesFbFirst();
	}
});

prevFirstFb.addEventListener('click', async () => {
	if (canChangeFirstFb) {
		firstSlideFbIndex--;
		slideImagesFbFirst();
	}
});

const prevSecondFb = document.getElementById('prev2-fb');
const nextSecondFb = document.getElementById('next2-fb');
const featuresImagesSecondSlideFb = document.getElementById('features-images-second-slide-fb');

const imagesFbSecond = ['./media/drink4.jpeg', './media/drink5.jpg', './media/drink6.jpg'];

let secondSlideFbIndex = 0;
let canChangeSecondFb = true; // New
let timeoutSecondFb; // New

async function slideImagesFbSecond() {
	if (secondSlideFbIndex >= imagesFbSecond.length) {
		secondSlideFbIndex = 0;
	} else if (secondSlideFbIndex < 0) {
		secondSlideFbIndex = imagesFbSecond.length - 1;
	}

	featuresImagesSecondSlideFb.style.opacity = '0.2'; // New
	featuresImagesSecondSlideFb.style.scale = '0.5'; // New
	canChangeSecondFb = false; // New

	timeoutSecondFb = setTimeout(() => {
		featuresImagesSecondSlideFb.src = imagesFbSecond[secondSlideFbIndex];
	}, 300);

	await FadeIn(featuresImagesSecondSlideFb, timeoutSecondFb); // New
	canChangeSecondFb = true; // New
}

nextSecondFb.addEventListener('click', async () => {
	if (canChangeSecondFb) {
		secondSlideFbIndex++;
		slideImagesFbSecond();
	}
});

prevSecondFb.addEventListener('click', async () => {
	if (canChangeSecondFb) {
		secondSlideFbIndex--;
		slideImagesFbSecond();
	}
});

const prevThirdFb = document.getElementById('prev3-fb');
const nextThirdFb = document.getElementById('next3-fb');
const featuresImagesThirdSlideFb = document.getElementById('features-images-third-slide-fb');

const imagesFbThird = ['./media/cafe4.jpg', './media/cafe5.jpg', './media/cafe6.jpg'];

let thirdSlideFbIndex = 0;
let canChangeThirdFb = true; // New
let timeoutThirdFb; // New

async function slideImagesFbThird() {
	if (thirdSlideFbIndex >= imagesFbThird.length) {
		thirdSlideFbIndex = 0;
	} else if (thirdSlideFbIndex < 0) {
		thirdSlideFbIndex = imagesFbThird.length - 1;
	}

	featuresImagesThirdSlideFb.style.opacity = '0.2'; // New
	featuresImagesThirdSlideFb.style.scale = '0.5'; // New
	canChangeThirdFb = false; // New

	timeoutThirdFb = setTimeout(() => {
		featuresImagesThirdSlideFb.src = imagesFbThird[thirdSlideFbIndex];
	}, 300);

	await FadeIn(featuresImagesThirdSlideFb, timeoutThirdFb); // New
	canChangeThirdFb = true; // New
}

nextThirdFb.addEventListener('click', async () => {
	if (canChangeThirdFb) {
		thirdSlideFbIndex++;
        slideImagesFbThird();
	}
});

prevThirdFb.addEventListener('click', async () => {
	if (canChangeThirdFb) {
		thirdSlideFbIndex--;
		slideImagesFbThird();
	}
});

// Fowlboys Our Review Image Slideshow
const prevReview = document.getElementById('prevButton');
const nextReview = document.getElementById('nextButton');
const reviewImagesFirstSlide = document.getElementById('review-images-first-slide');

const imagesReviewFirst = ['./media/insta2.jpg', './media/review3.jpg', './media/review4.jpg'];

let firstSlideReviewIndex = 0;
let canChangeReviewFb = true; // New
let timeoutReviewFb; // New

async function slideImagesReviewFirst() {
	if (firstSlideReviewIndex >= imagesReviewFirst.length) {
        firstSlideReviewIndex = 0;
    } else if (firstSlideReviewIndex < 0) {
        firstSlideReviewIndex = imagesReviewFirst.length - 1;
    }

	reviewImagesFirstSlide.style.opacity = '0.2'; // New
	reviewImagesFirstSlide.style.scale = '0.5'; // New
	canChangeReviewFb = false; // New

	timeoutReviewFb = setTimeout(() => {
		reviewImagesFirstSlide.src = imagesReviewFirst[firstSlideReviewIndex];
	}, 300);

	await FadeIn(reviewImagesFirstSlide, timeoutReviewFb); // New
	canChangeReviewFb = true; // New
}

nextReview.addEventListener('click', async () => {
	if (canChangeReviewFb) {
		firstSlideReviewIndex++;
		slideImagesReviewFirst();
	}
});

prevReview.addEventListener('click', async () => {
	if (canChangeReviewFb) {
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