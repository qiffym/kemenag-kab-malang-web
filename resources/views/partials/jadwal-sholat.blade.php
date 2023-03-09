<section id="waktu-sholat">
  <div class="row">
    <div class="col-12">
      <h1 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i class="fas fa-clock pe-1"></i>
        jadwal sholat <span class="badge bg-light text-dark ms-5">Malang</span>
        <br>
        <span class="fs-6 fw-light ">
          {{ now()->isoFormat('dddd, D MMMM Y') }}
        </span>
      </h1>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col text-center">
      @php
      $tanggal = date('Y-m-d');
      $file = file_get_contents("https://api.pray.zone/v2/times/"."day.json?city=malang&date=$tanggal");
      $data_waktu_sholat = json_decode($file, true);
      @endphp
      <div class="table-responsive">
        <table class="table bg-white border-start border-end">

          <thead>
            <tr class="">
              <th>IMSAK</th>
              <th>SUBUH</th>
              <th>DZUHUR</th>
              <th>ASAR</th>
              <th>MAGRIB</th>
              <th>ISYA'</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              @foreach ($data_waktu_sholat['results']['datetime'][0]['times'] as $nama => $waktu)
              @if ($nama=="Sunrise" or $nama=="Sunset" or $nama=="Midnight")
              @php
              continue;
              @endphp
              @endif
              <td scope="row">{{ $waktu }}</td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>