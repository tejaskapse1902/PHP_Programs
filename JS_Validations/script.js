function toggleVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    const isPassword = input.type === "password";
    input.type = isPassword ? "text" : "password";
    icon.classList.toggle("bi-eye");
    icon.classList.toggle("bi-eye-slash");
}

function checkPasswordValidation() {
    const password = document.getElementById("registerPassword")?.value;
    const confirmPassword = document.getElementById("registerConfirmPassword")?.value;
    const passwordFeedback = document.getElementById("passwordFeedback");
    const confirmFeedback = document.getElementById("confirmFeedback");

    if (!passwordFeedback || !confirmFeedback) return;

    const validations = [
        { regex: /.{8,}/, message: "At least 8 characters" },
        { regex: /[a-z]/, message: "At least one lowercase letter" },
        { regex: /[A-Z]/, message: "At least one uppercase letter" },
        { regex: /\d/, message: "At least one number" },
        { regex: /[\W_]/, message: "At least one special character" }
    ];

    const failedRules = validations.filter(rule => !rule.regex.test(password));
    passwordFeedback.innerHTML = failedRules.map(rule => `• ${rule.message}`).join("<br>");

    if (password && confirmPassword && password !== confirmPassword) {
        confirmFeedback.textContent = "Passwords do not match.";
    } else {
        confirmFeedback.textContent = "";
    }
}

// Handle Register Submit
document.getElementById("registerForm")?.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("registerName").value.trim();
    const email = document.getElementById("registerEmail").value.trim();
    const password = document.getElementById("registerPassword").value;
    const confirmPassword = document.getElementById("registerConfirmPassword").value;

    const nameFeedback = document.getElementById("nameFeedback");
    const emailFeedback = document.getElementById("emailFeedback");
    const passwordFeedback = document.getElementById("passwordFeedback");
    const confirmFeedback = document.getElementById("confirmFeedback");

    let isValid = true;

    nameFeedback.textContent = "";
    emailFeedback.textContent = "";

    if (!name || name.split(" ").length < 2) {
        nameFeedback.textContent = "Please enter your full name (first and last).";
        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        emailFeedback.textContent = "Email is required.";
        isValid = false;
    } else if (!emailRegex.test(email)) {
        emailFeedback.textContent = "Enter a valid email address.";
        isValid = false;
    }

    checkPasswordValidation();

    if (passwordFeedback.textContent !== "" || confirmFeedback.textContent !== "") {
        isValid = false;
    }

    if (isValid) {
        alert("Registration successful!");
        // Submit to backend or redirect
    } else {
        alert("Please correct the errors before submitting.");
    }
});

// Handle Login Submit
document.getElementById("loginForm")?.addEventListener("submit", function (e) {
    e.preventDefault();

    const email = document.getElementById("loginEmail").value.trim();
    const password = document.getElementById("loginPassword").value.trim();
    const emailFeedback = document.getElementById("emailFeedback");
    const passwordFeedback = document.getElementById("passwordFeedback");

    let isValid = true;
    emailFeedback.textContent = "";
    passwordFeedback.textContent = "";

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email) {
        emailFeedback.textContent = "Email is required.";
        isValid = false;
    } else if (!emailRegex.test(email)) {
        emailFeedback.textContent = "Enter a valid email.";
        isValid = false;
    }

    if (!password) {
        passwordFeedback.textContent = "Password is required.";
        isValid = false;
    }

    if (isValid) {
        alert("Login successful!");
        // Add backend login logic here
    }
});
