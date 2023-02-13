auth_form.addEventListener('submit', async (e) => {
    e.preventDefault();

    let response = await fetch('./vendor/authorization.php', {
        method: 'POST',
        body: new FormData(auth_form)
    });
    let result = await response.text();
    if (result != '') {
        error_block_auth.innerHTML = `${result}`;
    } else {
        location.replace("index.php")
    }
});