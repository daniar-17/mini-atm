@extends('main')

@section('title_content','Mini ATM')

@section('content')
  <div class="card">
    <div class="card-body">
    {{-- Part Up --}}
      <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body p-0">
                    <div class="alert alert-primary border-0 rounded-top rounded-0 m-0 d-flex align-items-center" role="alert">
                        <div class="flex-grow-1 text-truncate">
                            <b>Tarik Tunai</b>.
                        </div>
                    </div>
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md me-3">
                                <span class="avatar-title bg-soft-primary rounded-circle fs-1">
                                    <i class="ri-money-dollar-circle-line text-primary"></i>
                                </span>
                            </div>
                        </div>
                        <div>
                            <p class="fs-16 lh-base">Silahkan melakukan <strong>Tarik Tunai</strong> di Mini ATM ini, Klik Tombol diBawah.<i class="mdi mdi-arrow-down"></i>
                            </p>
                            <div class="mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikTunai">Tarik Tunai</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body p-0">
                    <div class="alert alert-success border-0 rounded-top rounded-0 m-0 d-flex align-items-center" role="alert">
                        <div class="flex-grow-1 text-truncate">
                            <b>Top Up Saldo</b>.
                        </div>
                    </div>
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md me-3">
                                <span class="avatar-title bg-soft-success rounded-circle fs-1">
                                    <i class="ri-currency-line text-success"></i>
                                </span>
                            </div>
                        </div>
                        <div>
                            <p class="fs-16 lh-base">Silahkan melakukan <strong>Top Up Saldo</strong> di Mini ATM ini, Klik Tombol diBawah.<i class="mdi mdi-arrow-down"></i>
                            </p>
                            <div class="mt-3">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#topUp">Top Up</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div>
        </div> <!-- end col-->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body p-0">
                    <div class="alert alert-info border-0 rounded-top rounded-0 m-0 d-flex align-items-center" role="alert">
                        <div class="flex-grow-1 text-truncate">
                            <b>Saldo</b>.
                        </div>
                    </div>
                    <div class="d-flex p-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md me-3">
                                <span class="avatar-title bg-soft-info rounded-circle fs-1">
                                    <i class="ri-wallet-line text-info"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h2>
                                Rp. {{ number_format($saldo->total, 0, ",", ".") }}
                            </h2>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div>
        </div> <!-- end col-->
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
        <div class="row">
            <table id="data-table" class="table dt-responsive nowrap table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Transaksi</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->nama }}</td>
                            <td>Rp. {{ number_format($item->jumlah, 0, ",", ".") }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>

    {{-- Modals Tarik Tunai --}}
    <div id="tarikTunai" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 overflow-hidden">
                <div class="modal-header p-3">
                    <h4 class="card-title mb-0">Tarik Tunai</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alert alert-primary rounded-0 mb-0">
                    <p class="mb-0">Silahkan Isi Jumlah yang akan di <strong>Tarik Tunai</strong>...</p>
                </div>
                <div class="modal-body">
                    <form action="javascript:formTarikTunai('tarik_tunai')" id="tarik_tunai" url="{{url('/atm/tarik_tunai')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="text" class="form-control uang" name="jumlah_tunai" id="jumlah_tunai" placeholder="Silahkan Isi.." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Tarik Tunai</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- Modals Top Up --}}
    <div id="topUp" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 overflow-hidden">
                <div class="modal-header p-3">
                    <h4 class="card-title mb-0">Top Up Saldo</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alert alert-success rounded-0 mb-0">
                    <p class="mb-0">Silahkan Isi Jumlah yang akan di <strong>Top Up</strong>...</p>
                </div>
                <div class="modal-body">
                    <form action="javascript:formTopUp('topup')" id="topup" url="{{url('/atm/topup')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="text" class="form-control uang" name="jumlah_topup" id="jumlah_topup" placeholder="Silahkan Isi.." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Top Up Saldo</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('addon-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#data-table").DataTable();

            //Error Message Function
            function errMsg(msg){
                Swal.fire({
                    icon: 'error',
                    title: msg,
                })
            }

            //Success Message Function
            function successMsg(msg){
                Swal.fire({
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            //Declare Csrf
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            //Tarik Tunai
            window.formTarikTunai = function(id){
                var param = $("#" + id).serialize();
                var url = $("#" + id).attr("url");
                var cekJumlah = $("#jumlah_tunai").val();
                if(cekJumlah == ""){
                    errMsg("Jumlah Tarik Tunai Tidak Boleh Kosong !");
                    return false;
                }
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: param,
                    url: url,
                    success: function(val) {
                        if (val["status"] == false) {
                            errMsg(val['info']);
                        }else{
                            successMsg(val['info']);
                            setTimeout(function() { 
                                window.location = '{{ url('atm') }}';
                            }, 1700);
                        }
                    },
                    error: function(val) {
                        console.log('Error: ', data);
                    }
                });
            }

            //Top Up
            window.formTopUp = function(id){
                var param = $("#" + id).serialize();
                var url = $("#" + id).attr("url");
                var cekJumlah = $("#jumlah_topup").val();
                if(cekJumlah == ""){
                    errMsg("Jumlah Top Up Tidak Boleh Kosong !");
                    return false;
                }
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: param,
                    url: url,
                    success: function(val) {
                        if (val["status"] == false) {
                            errMsg(val['info']);
                        }else{
                            successMsg(val['info']);
                            setTimeout(function() { 
                                window.location = '{{ url('atm') }}';
                            }, 1700);
                        }
                    },
                    error: function(val) {
                        console.log('Error: ', data);
                    }
                });
            }

            // Format Currency Rupiah
            $(".uang").keyup(function(e){
                $(this).val(format($(this).val()));
            });

            var format = function(num){
                var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
                if(str.indexOf(".") > 0) {
                    parts = str.split(".");
                    str = parts[0];
                }
                str = str.split("").reverse();
                for(var j = 0, len = str.length; j < len; j++) {
                    if(str[j] != ",") {
                    output.push(str[j]);
                    if(i%3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                    }
                }
                formatted = output.reverse().join("");
                return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
            };
        
        }); //Last Line
    </script>
@endpush
