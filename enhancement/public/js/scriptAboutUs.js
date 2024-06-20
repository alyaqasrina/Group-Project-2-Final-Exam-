const emailField = document.getElementById('email');
const nameField = document.getElementById('name');
const form = document.getElementById('form1');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const email = emailField.value.trim();
    const name = nameField.value.trim();

    if (!/^[a-zA-Z\s]+$/.test(name)) {
        alert('Name should contain only letters and spaces.');
        return;
    }

    if (!/\S+@\S+\.\S+/.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    alert('You are now subscribed to our newsletter!');
    nameField.value = '';
    emailField.value = '';
});