<div>
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h4>Siswa</h4>
              </div>

              <div class="card-body">

                <div class="buttons mb-3">
                  <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addStudentModal">
                    Tambah
                  </button>
                  <button type="button" class="btn btn-icon icon-left btn-success" data-toggle="modal"
                    data-target=".bd-example-modal-sm">
                    Import Excel
                  </button>
                  <a href="{{url('admin/siswa/excel')}}" class="btn btn-icon icon-left btn-warning"> Export Excel</a>
                </div>
                <div class="row mb-3">
                  <div class="col-8">
                    <select wire:model="searchColumnsCategoryId" class="form-control w-25" style="float: right;">
                      <option value="" selected>Kelas</option>
                      @foreach (App\Models\User::pluck('kelas', 'id') as $id => $kelas)
                      <option value="{{ $id }}">{{ $kelas }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-4">
                    <input
                    type="search"
                    class="form-control"
                    placeholder="Cari Data..."
                    wire:model="searchTerm"
                    />
                </div>
              </div>

              <table class="table table-striped table-hover" style="width:100%;">
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>GENDER</th>
                    <th>EMAIL</th>
                    <th>KELAS</th>
                    <th style="text-align: center;">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($siswas->count() > 0)
                  @foreach ($siswas as $siswa)
                  <tr>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->gender }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td style="text-align: center;">
                      <button class="btn btn-sm btn-primary" wire:click="editStudents({{ $siswa->id }})">Edit</button>
                      <a href="{{url('test/', $siswa->id )}}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="4" style="text-align: center;"><small>No Student Found</small></td>
                  </tr>
                  @endif
                </tbody>

              </table>
              <div style="float:right;">
                {{ $siswas->links() }}
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Modal -->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4>Relasi Guru - Kelas</h4>
              </div>
              <div class="card-body">
                <form wire:submit.prevent="editStudentData">
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
                      @foreach($halo as $kelas)
                      <tr>
                        <td class="text-center">
                          {{ $kelas->kelas_pendek }}
                        </td>
                        <td class="text-center">
                          <input class="form-check-input" type="checkbox" value="{{ $kelas->id }}" wire:model="kelass">
                          <label style="margin-top:3px; margin-left:3px;">Mengajar</label>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4>Relasi Guru - Mapel</h4>
              </div>
              <div class="card-body">

                <div class="form-group row">

                  <label for="nis" class="col-3">NIS</label>
                  <div class="col-9">

                    <input type="number" id="nis" class="form-control" wire:model="nis">
                    @error('nis')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                    @enderror

                  </div>


                </div>


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



        {{--         <form wire:submit.prevent="editStudentData">
          --}}
          {{--  --}}
          {{--           <div class="form-group row">
            --}}
            {{--             <label for="nis" class="col-3">NIS</label> --}}
            {{--             <div class="col-9">
              --}}
              {{--               <input type="number" id="nis" class="form-control" wire:model="nis"> --}}
              {{--               @error('nis') --}}
              {{--               <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> --}}
              {{--               @enderror --}}
              {{--
            </div>
            --}}
            {{--
          </div>
          --}}
          {{--  --}}
          {{--           <div class="form-group row">
            --}}
            {{--             <label for="nama" class="col-3">NAMA</label> --}}
            {{--             <div class="col-9">
              --}}
              {{--               <input type="text" id="nama" class="form-control" wire:model="nama"> --}}
              {{--               @error('nama') --}}
              {{--               <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> --}}
              {{--               @enderror --}}
              {{--
            </div>
            --}}
            {{--
          </div>
          --}}
          {{--  --}}
          {{--           <div class="form-group row">
            --}}
            {{--             <label for="gender" class="col-3">GENDER</label> --}}
            {{--             <div class="col-9">
              --}}
              {{--               <select class="form-control" id="gender" wire:model="gender"> --}}
                {{--                 <option selected>Choose...</option> --}}
                {{--                 <option value="1">One</option> --}}
                {{--                 <option value="2">Two</option> --}}
                {{--                 <option value="3">Three</option> --}}
                {{--               </select> --}}
              {{--               @error('gender') --}}
              {{--               <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> --}}
              {{--               @enderror --}}
              {{--
            </div>
            --}}
            {{--
          </div>
          --}}
          {{--  --}}
          {{--           <div class="form-group row">
            --}}
            {{--             <label for="email" class="col-3">EMAIL</label> --}}
            {{--             <div class="col-9">
              --}}
              {{--               <input type="email" id="email" class="form-control" wire:model="email"> --}}
              {{--               @error('email') --}}
              {{--               <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> --}}
              {{--               @enderror --}}
              {{--
            </div>
            --}}
            {{--
          </div>
          --}}
          {{--  --}}
          {{--           <div class="form-group row">
            --}}
            {{--             <label for="kelas" class="col-3">KELAS</label> --}}
            {{--             <div class="col-9">
              --}}
              {{--               <select class="form-control" id="kelas" wire:model="kelas"> --}}
                {{--                 <option selected>Choose...</option> --}}
                {{--                 <option value="1">One</option> --}}
                {{--                 <option value="2">Two</option> --}}
                {{--                 <option value="3">Three</option> --}}
                {{--               </select> --}}
              {{--               @error('kelas') --}}
              {{--               <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> --}}
              {{--               @enderror --}}
              {{--
            </div>
            --}}
            {{--
          </div>
          --}}
          {{--  --}}
          {{--           <div class="form-group row">
            --}}
            {{--             <label for="" class="col-3"></label> --}}
            {{--             <div class="col-9">
              --}}
              {{--               <button type="submit" class="btn btn-sm btn-primary">Simpan</button> --}}
              {{--
            </div>
            --}}
            {{--
          </div>
          --}}
          {{--
        </form>
        --}}
        {{--  --}}
      </div>
    </div>
  </div>
</div>
</div>