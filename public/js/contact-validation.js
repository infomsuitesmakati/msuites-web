document.addEventListener("DOMContentLoaded", () => {
    const nameInput = document.getElementById("name");

    // Prevent numbers in name field
    if (nameInput) {
        nameInput.addEventListener("input", function () {
            this.value = this.value.replace(/[0-9]/g, "");
        });
    }

    // Auto-hide success message after 5 seconds
    const successMessage = document.getElementById("success-message");
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.transition = "opacity 1s ease";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 1000);
        }, 5000);
    }
});
