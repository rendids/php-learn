function validateNumber(input) {
    if (input.value < 0) {
        input.setCustomValidity("Angka tidak boleh negatif.");
    } else {
        input.setCustomValidity("");
    }
}

