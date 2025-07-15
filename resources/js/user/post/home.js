// ====== Loading Screen ======
const hasShownLoading = sessionStorage.getItem("hasShownLoading");
const loadingScreen = document.getElementById("loadingScreen");

if (!hasShownLoading) {
    loadingScreen.style.display = "flex";

    setTimeout(() => {
        loadingScreen.classList.add("hidden");
        sessionStorage.setItem("hasShownLoading", "true");
    }, 3000);
} else {
    loadingScreen.style.display = "none";
}

// ====== Typewriter Effect ======
const text = "Selamat datang di toko kami! Kami menyediakan berbagai produk berkualitas yang dapat memenuhi kebutuhan Anda sehari-hari.";
const target = document.getElementById("typewriter");
let index = 0;

function type() {
    if (index < text.length) {
        target.innerHTML += text.charAt(index);
        index++;
        setTimeout(type, 30); // kecepatan ketik (ms)
    }
}

setTimeout(type, 500); // delay start ketik
