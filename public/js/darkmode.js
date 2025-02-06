const btnDarkmode = document.querySelector('#themeSwitch2');
const backgroundDM = document.querySelector('#backgroundDM');

btnDarkmode.addEventListener('click', darkmode);

function darkmode() {
    backgroundDM.classList.add('bg-dark');
    backgroundDM.classList.remove('bg-light');

}