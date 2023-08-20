<div>
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4>Relasi Guru - Kelas</h4>
              </div>

              <div class="card-body">
                <table border="0" class="table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center">
                        KELAS
                      </th>
                      <th class="text-center">
                        STATUS
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($siswas as $kelas)
                    <tr>
                      <td class="text-center">
                        {{ $kelas->kelas_pendek }}
                      </td>
                      <td class="text-center">

                        <input class="form-check-input" type="checkbox" value="{{ $kelas->id }}" wire:model="selectedCheckboxes">
                        <label style="margin-top:3px; margin-left:3px;">Mengajar</label>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4>Relasi Guru - Mapel</h4>
              </div>

              <div class="card-body">
                <table border="0" class="table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center">
                        KELAS
                      </th>
                      <th class="text-center">
                        STATUS
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($mapels as $mapel)
                    <tr>
                      <td class="text-center">
                        {{ $mapel->nama }}
                      </td>
                      <td class="text-center">
                        <input class="form-check-input" type="checkbox" value="{{ $mapel->id }}" wire:model="selectedCheckboxes2">
                        <label style="margin-top:3px; margin-left:3px;">Mengajar</label>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>