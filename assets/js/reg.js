reg_form.addEventListener('submit', async (e) => {
    e.preventDefault();

    let response = await fetch('./vendor/registration.php', {
        method: 'POST',
        body: new FormData(reg_form)
    });

    let result = await response.text();
    if (response.status === 202) {
        location.replace("auth.php")
    } else {
        error_block.innerHTML = `<b>${result}</b>`;
    }
});