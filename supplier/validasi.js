document.getElementById("no_telp").addEventListener("input", function() {
    var value = parseFloat(this.value);
    if (isNaN(value) || value < 0) {
        this.setCustomValidity("Harga barang harus angka dan tidak boleh kurang dari nol.");
    } else {
        this.setCustomValidity("");
    }
});
function validateForm() {
    var noTelpInput = document.getElementById('harga');
    var noTelp = noTelpInput.value;
    var noTelpError = document.getElementById('noTelpError');

    // Validasi nomor telepon
    if (noTelp === '') {
        noTelpError.textContent = "Nomor telepon harus diisi.";
        noTelpInput.focus();
        return false; // Menghentikan pengiriman form
    } else if (!/^\d+$/.test(noTelp)) {
        noTelpError.textContent = "Nomor telepon tidak valid. Harus terdiri dari angka.";
        noTelpInput.focus();
        return false; // Menghentikan pengiriman form
    } else {
        noTelpError.textContent = ""; // Menghapus pesan error jika valid
        return true; // Melanjutkan pengiriman form
    }
}