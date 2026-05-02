document.querySelectorAll('.js-heart').forEach(div => {
    const img = div.querySelector('.js-white-heart');
    const white = img.src;
    const red = white.replace('whitre-heart.png', 'red-heart.png');

    div.addEventListener('click', () => {
        img.src = img.src.includes('whitre-heart') ? red : white;
    });
});
