export function showConfirmasi() {
  const form = document.getElementById('beliForm');
  const jumlahInput = document.getElementById('jumlah_beli');
  const minusBtn = document.getElementById('minusBtn');
  const plusBtn = document.getElementById('plusBtn');

  const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
  const notaBody = document.getElementById('notaBody');
  const confirmButton = document.getElementById('confirmButton');

  const hargaSatuan = parseInt(form.dataset.hargaSatuan);
  const namaBarang = form.dataset.namaBarang;
  const namaPembeli = form.dataset.namaPembeli;
  const stok = parseInt(form.dataset.stok);

  minusBtn.addEventListener('click', function(e) {
    e.preventDefault();
    let value = parseInt(jumlahInput.value);
    if (value > 1) {
      jumlahInput.value = value - 1;
    }
  });

  plusBtn.addEventListener('click', function(e) {
    e.preventDefault();
    let value = parseInt(jumlahInput.value);
    if (value < stok) {
      jumlahInput.value = value + 1;
    }
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const jumlah = parseInt(jumlahInput.value);
    const totalHarga = jumlah * hargaSatuan;

    notaBody.innerHTML = `
      <p><strong>Nama Barang:</strong> ${namaBarang}</p>
      <p><strong>Nama Pembeli:</strong> ${namaPembeli}</p>
      <p><strong>Jumlah:</strong> ${jumlah}</p>
      <p><strong>Harga Satuan:</strong> Rp ${hargaSatuan.toLocaleString('id-ID')}</p>
      <p><strong>Total Harga:</strong> Rp ${totalHarga.toLocaleString('id-ID')}</p>
      <hr>
      <p class="text-danger fw-semibold">Pastikan data sudah benar sebelum melanjutkan!</p>
    `;

    modal.show();
  });

  confirmButton.addEventListener('click', function() {
    modal.hide();
    form.submit();
  });
}

// Panggil fungsi secara otomatis saat DOM siap:
document.addEventListener('DOMContentLoaded', () => {
  showConfirmasi();
});
