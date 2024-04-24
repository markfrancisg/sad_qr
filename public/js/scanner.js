function domReady(fn) {
    if (
        document.readyState === "complete" ||
        document.readyState === "interactive"
    ) {
        setTimeout(fn, 1000);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

domReady(function () {

    // If QR code is found
    function onScanSuccess(decodeText, decodeResult) {
        // Redirect to a PHP script with the decoded QR code text as a query parameter
        window.location.href = "../../../includes/qr_code_scanner.inc.php?qr_text=" + encodeURIComponent(decodeText);
    }

    // Render the QR code scanner
    let htmlscanner = new Html5QrcodeScanner(
        "my-qr-reader",
        { fps: 10, qrbos: 250 }
    );
    htmlscanner.render(onScanSuccess);
});
