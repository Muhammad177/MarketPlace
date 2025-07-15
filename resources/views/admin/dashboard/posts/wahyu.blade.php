<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contoh Semua Prefix Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

  <div class="container mx-auto">
    <div class="
      w-full
      sm:w-5/6
      md:w-2/3
      lg:w-1/2
      xl:w-1/3
      2xl:w-1/4
      bg-gradient-to-r from-blue-400 to-purple-500
      text-white p-6 rounded shadow transition-all
    ">
      <h1 class="text-2xl font-bold mb-2">Container Responsif Lengkap</h1>
      <p>
        - Mobile (default): 100% lebar (w-full) <br>
        - sm (≥640px): 5/6 lebar <br>
        - md (≥768px): 2/3 lebar <br>
        - lg (≥1024px): 1/2 lebar <br>
        - xl (≥1280px): 1/3 lebar <br>
        - 2xl (≥1536px): 1/4 lebar

      </p>
      

    </div>
    <div>
      <h2 class="mt-4 text-lg text-center fw-bold">Portofilo Catalog</h2>
      <embed src="https://drive.google.com/file/d/1TY-FbVj-uULsyqN8qPY-JR4qVos1qDSn/preview" width="600px" height="500px">

      <a href="https://drive.usercontent.google.com/download?id=1TY-FbVj-uULsyqN8qPY-JR4qVos1qDSn&export=download&authuser=0&confirm=t&uuid=85e14057-9d5d-4e1c-8ecd-9e31956aba9e&at=AN8xHop2gn_-AH3Qlda-o_PFdwQw:1751518330289">
  <button style="display: flex; align-items: center; padding: 6px 12px; border: none; background-color: #d32f2f; color: white; border-radius: 5px; cursor: pointer;">
    <img src="https://play-lh.googleusercontent.com/IkcyuPcrQlDsv62dwGqteL_0K_Rt2BUTXfV3_vR4VmAGo-WSCfT2FgHdCBUsMw3TPGU" alt="PDF Icon" style="width: 20px; height: 20px; margin-right: 8px;">
    Download PDF
  </button>
</a>
    </div>
  </div>

   <table class="table table-hover align-middle text-center border rounded-4 overflow-hidden">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tema</th>
        <th scope="col">Judul</th>
        <th scope="col">Author</th>
        <th scope="col">Created</th>
        <th scope="col" colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
    
      <tr class="table-row-hover">
        <td>coba</td>
        <td>coba2</td>
        <td class="fw-semibold">coba3</td>
        <td>coba4</td>
        <td>coba5</td>
        <td>
          <a href="" class="btn btn-outline-info btn-sm rounded-pill px-3 fw-semibold">
          <i class="bi bi-eye"></i> View
          </a>
        </td>
        <td>
          <a href="" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
        </td>
        <td>
          <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="">
            <i class="bi bi-trash"></i> Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  
<style>
  .table-row-hover:hover {
    background: rgb(255, 4, 4);
  }
</style>
</body>
</html>
