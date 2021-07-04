@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Grafik</h1>
        
      </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
        <div class="max-w-screen-2xl mx-auto">
          <div class="py-3">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-5 bg-white border-b border-gray-200">
                        <div class="md:flex mb-6">
                            <div class="md:w-full">
                                <select name="provinsi" id="provinsi" class="form-select block w-full focus:bg-white">
                                    <option>--Filter--</option>
                                    <option value="0">Semua</option>
                                    @foreach ($provinsi as $item)
                                       
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <canvas id="prov"></canvas>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="flex-1 py-4 lg:py-10">
        <div class="max-w-screen-2xl mx-auto">
          <div class="py-3">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-5 bg-white border-b border-gray-200">
                        <div class="md:flex mb-6">
                            <div class="md:w-full">
                                <select name="bidang" id="bidang" class="form-select block w-full focus:bg-white">
                                    <option>--Filter--</option>
                                    <option value="0">Semua</option>
                                    @foreach ($bidang as $item)
                                       
                                        <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <canvas id="bidprov"></canvas>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <!--/ main content -->
  </div>
@endsection
@section('script')
<script>
    
    var ctx = document.getElementById("prov").getContext('2d');
            var myCharts = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels:[],
                  datasets: [
                    {
                      label: 'Pendaftar',
                      data: [],
                      backgroundColor: "orange",
                      borderWidth: 1
                  },
                  {
                      label: 'Pengunggah',
                      data: [],
                      backgroundColor: "blue",
                      borderWidth: 1
                  }
                ]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  },
                  plugins: {
            title: {
                display: true,
                text: 'Jumlah Peserta Per Bidang'
            }
        }
              }
          });



    $('#provinsi').on('change', function() {
        var selValue = document.getElementById("provinsi").value;
        var e = document.getElementById("provinsi");
        var texte = e.options[e.selectedIndex].text;
        var url = "{{ route('per_bidang_provinsi', ":id") }}";
        url = url.replace(':id', selValue);

        console.log(texte);

        $.ajax({
        url : url,
        type : 'GET',
        dataType : 'JSON',
        success : function(response) {
            console.log(response);
            var Pendaftarr = new Array();
            var Pengunggahh = new Array();
            var Labell = new Array();
            response.forEach(function(data){
                Pendaftarr.push(data.pendaftar);
                Pengunggahh.push(data.pengunggah);
                Labell.push(data.nama_bidang.concat(' ',texte));
            });

            myCharts.data.labels = Labell;
            myCharts.data.datasets[0].data = Pendaftarr;
            myCharts.data.datasets[1].data = Pengunggahh;
            myCharts.update();
        }    
    })
    });
    
</script>
<script>
    
    var ctx = document.getElementById("bidprov").getContext('2d');
            var myChartss = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels:[],
                  datasets: [
                    {
                      label: 'Pendaftar',
                      data: [],
                      backgroundColor: "orange",
                      borderWidth: 1
                  },
                  {
                      label: 'Pengunggah',
                      data: [],
                      backgroundColor: "green",
                      borderWidth: 1
                  }
                ]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  },
                  plugins: {
            title: {
                display: true,
                text: 'Jumlah Peserta Per Bidang'
            }
        }
              }
          });



    $('#bidang').on('change', function() {
        var selValue = document.getElementById("bidang").value;
        var e = document.getElementById("bidang");
        var texte = e.options[e.selectedIndex].text;
        var url = "{{ route('bidang_prov', ":id") }}";
        url = url.replace(':id', selValue);

        console.log(texte);

        $.ajax({
        url : url,
        type : 'GET',
        dataType : 'JSON',
        success : function(response) {
            console.log(response);
            var Pendaftarr = new Array();
            var Pengunggahh = new Array();
            var Labell = new Array();
            response.forEach(function(data){
                Pendaftarr.push(data.pendaftar);
                Pengunggahh.push(data.pengunggah);
                Labell.push(data.nama_bidang);
            });

            myChartss.data.labels = Labell;
            myChartss.data.datasets[0].data = Pendaftarr;
            myChartss.data.datasets[1].data = Pengunggahh;
            myChartss.update();
        }    
    })
    });
    
</script>

@endsection