const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
if (spinnerWrapperEl) {
    window.addEventListener('load', () => {
        spinnerWrapperEl.style.opacity = '0';
        setTimeout(() => {
            spinnerWrapperEl.style.display = 'none';
        }, 200);
    });
} else {
    console.warn("Element with class 'spinner-wrapper' not found.");
}
