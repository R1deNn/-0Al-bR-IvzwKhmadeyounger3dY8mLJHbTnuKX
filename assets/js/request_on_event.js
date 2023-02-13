event_form.addEventListener('submit', async (e) => {
    e.preventDefault();

    let response = await fetch('./vendor/request_event.php', {
        method: 'POST',
        body: new FormData(event_form)
    });

    let result = await response.text();
    if (response.status === 202) {
        event_form.style.display = 'none';
        info_block.innerHTML = '<b style="color: green;">Вы успешно зарегистрировались на мероприятие!</b>';
    } else {
        info_block.innerHTML = `<b>${result}</b>`;
    }
});