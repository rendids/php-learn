
document.getElementById("harga").addEventListener("input", function() {
    var value = parseFloat(this.value);
    if (isNaN(value) || value < 0) {
        this.setCustomValidity("Harga barang harus angka dan tidak boleh kurang dari nol.");
    } else {
        this.setCustomValidity("");
    }
});
document.getElementById("stok").addEventListener("input", function() {
    var value = parseFloat(this.value);
    if (isNaN(value) || value < 0) {
        this.setCustomValidity("stok barang harus angka dan tidak boleh kurang dari nol.");
    } else {
        this.setCustomValidity("");
    }
});
document.getElementById("images").addEventListener("change", function() {
    var file = this.files[0];
    var maxSizeInBytes = 5 * 1024 * 1024; // 5MB
    var allowedExtensions = ["jpg", "jpeg", "png", "gif"];
    if (file) {
        var fileSize = file.size;
        var fileName = file.name;
        var fileExtension = fileName.split(".").pop().toLowerCase();
         if (!allowedExtensions.includes(fileExtension)) {
                this.setCustomValidity("Ekstensi file tidak valid. Harap pilih file dengan ekstensi: " + allowedExtensions.join(", "));
            } else if (fileSize > maxSizeInBytes) {
                this.setCustomValidity("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimum 5MB.");
            } else {
                this.setCustomValidity("");
            }
        }
    });
    document.getElementById("nama").addEventListener("input", function() {
        var namaInput = this.value.trim();
        var errorElement = document.getElementById("namaError");

        if (namaInput === "") {
            errorElement.textContent = "Nama barang tidak boleh kosong.";
        } else {
            errorElement.textContent = "";
        }
    });
    function generateRandomName() {
        var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        var nameLength = 8;
        var randomName = "";
        for (var i = 0; i < nameLength; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            randomName += characters.charAt(randomIndex);
        }
        return randomName;
    }
    document.getElementById("images").addEventListener("change", function() {
        var file = this.files[0];
        var errorElement = document.getElementById("gambarError");
        if (file) {
            var fileType = file.type.split("/")[1];
            var newName = generateRandomName() + "." + fileType;
            errorElement.textContent = "Nama gambar: " + newName;
        }
    });

    function validateForm() {
        var namaInput = document.getElementById('nama');
        var nama = namaInput.value;
        var namaError = document.getElementById('namaError');

        // Validasi input nama barang
        if (nama === '') {
            namaError.textContent = "Nama barang harus diisi.";
            namaInput.focus();
            return false; // Menghentikan pengiriman form
        } else {
            namaError.textContent = ""; // Menghapus pesan error jika valid
            return true; // Melanjutkan pengiriman form
        }
    }