// Homepage Slide
const prevHomepage = document.getElementById('prevHomeButton');
const nextHomepage = document.getElementById('nextHomeButton');
const homepageImagesFirstSlide = document.getElementById('homepage-images-first-slide');

const imagesHomepageFirst = ['./media/review2.jpg', './media2/ilhamGallery/ReviewIg1.png', './imagesSunway/sunway1.jpg'];

let firstSlideHomepageIndex = 0;
let canChangeHomepage = true;
let timeoutHomepage;  

async function slideImagesHomepageFirst() {
	if (firstSlideHomepageIndex >= imagesHomepageFirst.length) {
		firstSlideHomepageIndex = 0;
	} else if (firstSlideHomepageIndex < 0) {
		firstSlideHomepageIndex = imagesHomepageFirst.length - 1;
	}

	homepageImagesFirstSlide.style.opacity = '0.2'; 
	homepageImagesFirstSlide.style.scale = '0.5'; 
	canChangeHomepage = false;  

	timeoutHomepage = setTimeout(() => {
    homepageImagesFirstSlide.src = imagesHomepageFirst[firstSlideHomepageIndex];
	}, 300);

	await FadeIn(homepageImagesFirstSlide, timeoutHomepage);
	canChangeHomepage = true; 
}

nextHomepage.addEventListener('click', async () => {
	if (canChangeHomepage) {
		firstSlideHomepageIndex++;
		slideImagesHomepageFirst();
	}
});

prevHomepage.addEventListener('click', async () => {
	if (canChangeHomepage) {
		firstSlideHomepageIndex--;
		slideImagesHomepageFirst();
	}
});

// Fade Functions // New
async function FadeIn(param, timeout) {
	setTimeout(() => {
		param.style.opacity = '1';
		param.style.scale = '1';
		clearTimeout(timeout);
	}, 300); // 1000 is 1 second
}