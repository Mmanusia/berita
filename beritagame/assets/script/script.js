// Disable right-click on the whole document
document.addEventListener('contextmenu', function (event) {
    event.preventDefault();  // Prevent the right-click context menu
});


function darkmodeBTN() {
    let darkmode = localStorage.getItem('darkmode');
    const themeSwitch = document.getElementById('theme-switch');

    const enableDarkmode = () => {
        document.body.classList.add('darkmode');
        localStorage.setItem('darkmode', 'active');
    }

    const disableDarkmode = () => {
        document.body.classList.remove('darkmode');
        localStorage.setItem('darkmode', null);
    }

    if (darkmode === "active") enableDarkmode();

    themeSwitch.addEventListener("click", () => {
        darkmode = localStorage.getItem('darkmode');
        darkmode !== "active" ? enableDarkmode() : disableDarkmode();
    })
}

function redirectToSearch() {
    window.location.href = "search.php";
}
