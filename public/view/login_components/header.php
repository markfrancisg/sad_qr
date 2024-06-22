<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SeQRity Gate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="public/images/logos/small_san_lorenzo_logo.png" />
    <link rel="stylesheet" href="public/css/styles.min.css" />
    <link rel="stylesheet" href="public/css/bg_land_page.css" />

</head>

<div class="spinner-wrapper">
    <div class="spinner-border" role="status">
    </div>
</div>

<script>
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
</script>