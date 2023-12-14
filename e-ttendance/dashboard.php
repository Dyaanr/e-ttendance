<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dashboard.css">

  </head>
  <body>
    <div class="container" >
        <span class="redvillain"> 
        <div class="row d-flex align-items-center justify-content-center   " style="height: 100vh; width:100%">
            <div class="col-md-6">
                <h1 class="row d-flex justify-content-center" id="text">Isi Data Dibawah</h1>
                <div class="card border-1 shadow rounded">
                  <div class="">
                 
                  </div>
                  <form name="kirim_data">
                    <div class="card-body">
                      <!-- alert -->
                      <div class="alert alert-success alert-dismissible fade show alert-berhasil d-none" role="alert">
                        <strong>Kirim data berhasil!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      </span>
                        <tbody id="tabelBody">
                        <tr>
                          <td>
                            <strong>Keterangan waktu</strong>
                            <input type="datetime-local" class="form-control" id="birthdaytime" name="waktu">
                          </td>
                            <td>
                                <strong>Keterangan siswa</strong>
                                <!-- <input type="checkbox" class="btn-check" name="status" > -->
                              <select class="form-control pilihan" name="keterangan">
                                <option value="">Status</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Alpha">Alpha</option>
                                
                              </select>
                            </td>
                            <td>
                                <strong>Kelas</strong>
                              <select class="form-control pilihan" name="kelas">
                                <option value="">pilih kelas</option>
                                <option value="XI RPL">XI RPL</option>
                                <option value="XI TKJ">XI TKJ</option>
                                <option value="XI MM">XI MM</option>
                                <option value="XI OTKP">XI OTKP</option>
                                
                              </select>
                            </td>
                            <td>        
                                <strong>Nama</strong>           
                              <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" name="status" >
                                <!-- <label class="btn btn-outline-primary" for="btncheck1">Terlambat</label> -->
                              </div>
                            </td>
                            <td>
                              <a href="" class="btn btn-danger btn-remove"><span class="badge rounded-pill text-bg-danger">Reset</span></a>
                            </td>
                        </tr>
                            <!-- Tambahkan baris sebanyak yang Anda perlukan -->
                        </tbody>
                      </table>
                    </div>
                    <div class="p-3">
                        <button type="submit" class="btn btn-success btn-kirim">Kirim data</button>
                        <button class="btn btn-success btn-loading d-none" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                      </button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- proses kirim data ke database -->
    <script>
      const scriptURL = 'https://script.google.com/macros/s/AKfycbw9TT_ZTUBvGiLQscvQ7QTL3bOqdHfEj96vcBIjb7bKS_v2LlSnS2_hYGumrYmxjIU/exec'
      const form = document.forms['kirim_data']
      const btnLoading = document.querySelector('.btn-loading');
      const btnKirim = document.querySelector('.btn-kirim');
      const alertBerhasil = document.querySelector('.alert-berhasil');

      form.addEventListener('submit', e => {
        e.preventDefault();

        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');

        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => {
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            alertBerhasil.classList.toggle('d-none');
            form.reset();

            console.log('Success!', response);
          })
          .catch(error => console.error('Error!', error.message))
      });
    </script>

    <script>
        function logout() {
            console.log("Berhasil logout");
            window.location.href = "index.php";
            history.pushState(null, null, "index.php");
        }
    </script>

    <script>
      document.getElementById('tambahBaris').addEventListener('click', function() {
        var tbody = document.getElementById('tabelBody');
        var newRow = document.createElement('tr');
        var rowCount = tbody.getElementsByTagName('tr').length + 1; // Menghitung jumlah baris
    
        newRow.innerHTML = `
        <td>                   
          <input type="datetime-local" class="form-control" id="birthdaytime" name="jam_terlambat_${rowCount}">
        <td>
          <select class="form-control" id="pilihan" name="kelas_${rowCount}">
            <option value="">Pilih Kelas</option>
            <option value="X PPLG">X PPLG</option>
            <option value="X DKV">X DKV</option>
            <option value="X TJKT 1">X TJKT 1</option>
            <option value="X TJKT 2">X TJKT 2</option>
          </select>
        <td>
            <input type="text" class="form-control" name="nama_${rowCount}" placeholder="Nama Siswa">
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" autocomplete="off" checked>
                <label class="btn btn-outline-primary">Terlambat</label>
            </div>
        </td>
        <td>
          <a href="" class="btn btn-danger btn-remove"><span class="badge rounded-pill text-bg-danger"><i class="bi bi-trash-fill"></i></span></a>
        </td>
        `;
    
        tbody.appendChild(newRow);
    });
    document.getElementById('tabelBody').addEventListener('click', function(e) {
      if (e.target.classList.contains('btn-remove')) {
          e.target.parentElement.parentElement.remove();
      }
    });    
    </script>      
  </body>
</html>