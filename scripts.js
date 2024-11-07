<script>
    // Function to open modal
    function openModal(formId) {
        document.getElementById(formId).style.display = "flex";
    }

    // Function to close modal
    function closeModal(formId) {
        document.getElementById(formId).style.display = "none";
    }

    // Event listeners for login and signup buttons
    document.querySelector(".login-btn").addEventListener("click", function(event) {
        event.preventDefault();
        openModal("loginForm");
    });

    document.querySelector(".signup-btn").addEventListener("click", function(event) {
        event.preventDefault();
        openModal("registerForm");
    });
</script>
