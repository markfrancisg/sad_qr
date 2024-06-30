function restrictInput(event) {
    const inputField = event.target;
    // Allow only letters and hyphens
    inputField.value = inputField.value.replace(/[^A-Za-z0-9-]/g, '');
        // Convert to uppercase
    inputField.value = inputField.value.toUpperCase();
}