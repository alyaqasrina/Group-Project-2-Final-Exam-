// Poppy Kat Features Image Slideshow
const prevFirst = document.getElementById('prev');
const nextFirst = document.getElementById('next');
const featuresImagesFirstSlide = document.getElementById('features-images-first-slide');

const imagesFirst = ['/Group-Project-2-Final-Exam-/enhancement/media/food1.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/food2.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/food3.jpg'];

let firstSlideIndex = 0;
let canChangeFirst = true;
let timeoutFirst; 

async function slideImagesFirst() {
	if (firstSlideIndex >= imagesFirst.length) {
		firstSlideIndex = 0;
	} else if (firstSlideIndex < 0) {
		firstSlideIndex = imagesFirst.length - 1;
	}

	featuresImagesFirstSlide.style.opacity = '0.2';  
	featuresImagesFirstSlide.style.scale = '0.5'; 
	canChangeFirst = false;  

	 
	timeoutFirst = setTimeout(() => {
		featuresImagesFirstSlide.src = imagesFirst[firstSlideIndex];
	}, 300);

	await FadeIn(featuresImagesFirstSlide, timeoutFirst);  
	canChangeFirst = true;  
}

nextFirst.addEventListener('click', async () => {
	if (canChangeFirst) {
		firstSlideIndex++;
		await slideImagesFirst();
	}
});

prevFirst.addEventListener('click', async () => {
	if (canChangeFirst) {
		firstSlideIndex--;
		await slideImagesFirst();
	}
});

// Second
const prevSecond = document.getElementById('prev2');
const nextSecond = document.getElementById('next2');
const featuresImagesSecondSlide = document.getElementById('features-images-second-slide');

const imagesSecond = ['/Group-Project-2-Final-Exam-/enhancement/media/drink2.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/drink1.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/drink3.jpg'];

let secondSlideIndex = 0;
let canChangeSecond = true;
let timeoutSecond;  

async function slideImagesSecond() {
	if (secondSlideIndex >= imagesSecond.length) {
		secondSlideIndex = 0;
	} else if (secondSlideIndex < 0) {
		secondSlideIndex = imagesSecond.length - 1;
	}

	featuresImagesSecondSlide.style.opacity = '0.2'; 
	featuresImagesSecondSlide.style.scale = '0.5'; 
	canChangeSecond = false; 

	
	timeoutSecond = setTimeout(() => {
		featuresImagesSecondSlide.src = imagesSecond[secondSlideIndex];
	}, 300);

	await FadeIn(featuresImagesSecondSlide, timeoutSecond);  
	canChangeSecond = true;
}

prevSecond.addEventListener('click', async () => {
	if (canChangeSecond) {
		secondSlideIndex--;
		await slideImagesSecond();
	}
});

nextSecond.addEventListener('click', async () => {
	if (canChangeSecond) {
		secondSlideIndex++;
		await slideImagesSecond();
	}
});

// Third
const prevThird = document.getElementById('prev3');
const nextThird = document.getElementById('next3');
const featuresImagesThirdSlide = document.getElementById('features-images-third-slide');

const imagesThird = ['/Group-Project-2-Final-Exam-/enhancement/media/cafe1.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/cafe2.jpeg', '/Group-Project-2-Final-Exam-/enhancement/media/cafe3.jpeg'];

let thirdSlideIndex = 0;
let canChangeThird = true; 
let timeoutThird;  

async function slideImagesThird() {
	if (thirdSlideIndex >= imagesThird.length) {
		thirdSlideIndex = 0;
	} else if (thirdSlideIndex < 0) {
		thirdSlideIndex = imagesThird.length - 1;
	}

	featuresImagesThirdSlide.style.opacity = '0.2';  
	featuresImagesThirdSlide.style.scale = '0.5';  
	canChangeThird = false;  

	
	timeoutThird = setTimeout(() => {
		featuresImagesThirdSlide.src = imagesThird[thirdSlideIndex];
	}, 300);

	await FadeIn(featuresImagesThirdSlide, timeoutThird); 
	canChangeThird = true; 
}

prevThird.addEventListener('click', async () => {
	if (canChangeThird) {
		thirdSlideIndex--;
		await slideImagesThird();
	}
});

nextThird.addEventListener('click', async () => {
	if (canChangeThird) {
		thirdSlideIndex++;
		await slideImagesThird();
	}
});

// Poppy Kat Our Review Slide
const prevReview = document.getElementById('prevButton');
const nextReview = document.getElementById('nextButton');
const reviewImagesFirstSlide = document.getElementById('review-images-first-slide');

const imagesReviewFirst = ['/Group-Project-2-Final-Exam-/enhancement/media/insta1.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/review1.jpg', '/Group-Project-2-Final-Exam-/enhancement/media/review2.jpg'];

let firstSlideReviewIndex = 0;
let timeoutSlideFirst;  

let canChangeFirstSlide = true;

async function slideImagesReviewFirst() {
	if (firstSlideReviewIndex >= imagesReviewFirst.length) {
		firstSlideReviewIndex = 0;
	} else if (firstSlideReviewIndex < 0) {
		firstSlideReviewIndex = imagesReviewFirst.length - 1;
	}

	reviewImagesFirstSlide.style.opacity = '0.2'; 
	reviewImagesFirstSlide.style.scale = '0.5'; 
	canChangeFirstSlide = false;  

	
	timeoutSlideFirst = setTimeout(() => {
		reviewImagesFirstSlide.src = imagesReviewFirst[firstSlideReviewIndex];
	}, 300);

	await FadeIn(reviewImagesFirstSlide, timeoutSlideFirst);
	canChangeFirstSlide = true; 
}

nextReview.addEventListener('click', async () => {
	if (canChangeFirstSlide) {
		firstSlideReviewIndex++;
		await slideImagesReviewFirst();
	}
});

prevReview.addEventListener('click', async () => {
	if (canChangeFirstSlide) {
		firstSlideReviewIndex--;
		await slideImagesReviewFirst();
	}
});

// Code for today to copy to clipboard
const code = document.getElementById('code-for-today');

code.addEventListener('click', () => {
	navigator.clipboard.writeText(code.innerHTML);

	alert("Yeay! You have successfully copied the code. (*^▽^*)");
});

// Fade Functions // 
async function FadeIn(param, timeout) {
	setTimeout(() => {
		param.style.opacity = '1';
		param.style.scale = '1';
		clearTimeout(timeout);
	}, 300);
}
