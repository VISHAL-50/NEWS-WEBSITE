let body = document.body;
let profiles = document.querySelectorAll('.button-container .header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
    console.log("hello world");
    profiles.forEach((profile) => {
        profile.classList.toggle('active');
    });
}

window.onscroll = () => {
    profiles.forEach((profile) => {
        profile.classList.remove('active');
    });
}

let togglebtn = document.querySelector('#toggle-btn');
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () => {
    togglebtn.classList.replace('fa-sun', 'fa-moon');
    body.classList.add('dark');
    localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () => {
    togglebtn.classList.replace('fa-moon', 'fa-sun');
    body.classList.remove('dark');
    localStorage.setItem('dark-mode', 'disabled');
}

if (darkMode === 'enabled') {
    enableDarkMode();
}

togglebtn.onclick = (e) => {
    let darkMode = localStorage.getItem('dark-mode');
    if (darkMode === 'disabled') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
}
