const email = document.getElementById('email');
const userName = document.getElementById('name');
const form = document.getElementById('form1');

form.addEventListener('submit', (e) => {
    e.preventDefault(); 
    if (userName.value.length > 0 && email.value.length > 0) {
        alert('You are now subscribed to our newsletter!');
        userName.value = '';
        email.value = '';
    }
})