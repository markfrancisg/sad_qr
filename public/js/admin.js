
    // document.addEventListener("DOMContentLoaded", function() {
    //     const toggle = document.getElementById('sidebarToggle');
    //     const sidebar = document.getElementById('accordionSidebar');
    
    //     toggle.addEventListener('click', function(event) {
    //         event.preventDefault();
    //         sidebar.classList.toggle('active');
    //     });
    
    //     document.addEventListener('click', function(event) {
    //         if (!sidebar.contains(event.target) && event.target !== toggle) {
    //             sidebar.classList.remove('active');
    //         }
    //     });
    // });
    
    //enables button if user inputs data

    




























    // document.addEventListener('DOMContentLoaded', function() {
    //     var viewLinks = document.querySelectorAll('[data-toggle="modal"]');
    //     viewLinks.forEach(function(link) {
    //         link.addEventListener('click', function(event) {
    //             event.preventDefault(); // Prevent default link behavior

    //             // Extract data from data-id attribute
    //             var data = this.getAttribute('data-id').split(',');

    //             // Format and populate modal with extracted data
    //             document.getElementById('accountIdPlaceholder').textContent = "Account ID: " + data[0]; // Assuming data[0] is account ID

    //             // You can continue formatting and populating other fields similarly
    //         });
    //     });
    // });

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
