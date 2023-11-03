function validateNumber() {
    var numberInput = document.getElementById("no_telp");
    var number = parseInt(numberInput.value);
    
    if (number < 0) {
        numberInput.setCustomValidity("Angka tidak boleh negatif.");
    } else {
        numberInput.setCustomValidity("");
    }
}
function validateEmail(input) {
    var email = input.value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!emailPattern.test(email)) {
        input.setCustomValidity("Email tidak valid.");
    } else {
        input.setCustomValidity("");
    }
}