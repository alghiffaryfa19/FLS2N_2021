<x-guest-layout>

    <!-- Section 1 -->
    <section class="w-full bg-white">
    
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col lg:flex-row">
                
    
                <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                        <h4 class="w-full text-3xl font-bold">Lupa Kata Sandi ?</h4>
                        <p class="text-lg text-gray-500">Kami Bantu</p>
                        
                            <div class="relative w-full mt-10 space-y-8">
                                <form id="form-certificate-check" action="{{route('post_password')}}" method="POST">
                                    @csrf
                                    <div class="relative">
                                        <label class="font-medium text-gray-900">NISN</label>
                                        <input name="nisn" required type="number" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Masukkan NISN">
                                    </div>
                                    <div class="relative">
                                        <label class="font-medium text-gray-900">Email Yang Didaftarkan</label>
                                        <input name="email" required type="email" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Masukkan Email">
                                    </div>
                                    <div class="relative">
                                        <label class="font-medium text-gray-900">Tanggal Lahir</label>
                                        <input name="tgl_lahir" required type="date" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Tanggal Lahir">
                                    </div>
                                    <div class="relative">
                                        <label class="font-medium text-gray-900">Nama Ibu</label>
                                        <input name="nama_ibu" type="text" required class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Nama Ibu">
                                    </div>
                                    <div class="relative">
                                        <label class="font-medium text-gray-900">Sebagai</label>
                                        <select name="ketua" required class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50">
                                            <option value="1">Ketua</option>
                                            <option value="0">Anggota Film Pendek</option>
                                        </select>
                                    </div>
                                    <div class="relative mt-10">
                                        <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">Cari</button>
                                    </div>
                                </form>
                            </div>
                        
                    </div>
                </div>
                <div id="state" style="display: block" class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-white">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase">Festival Lomba Seni Siswa Nasional @php echo date('Y') @endphp</p>
                                <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Sudah daftar tapi lupa kata sandi ?</h2>
                            </div>
                            <p class="text-2xl text-gray-700">Silahkan isi data, kami bantu ingatkan</p>
                        </div>
                    </div>
                </div>
                <div id="not_found" style="display: none" class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-white">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase">Festival Lomba Seni Siswa Nasional @php echo date('Y') @endphp</p>
                                <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Data Tidak Ditemukan</h2>
                            </div>
                            <p class="text-2xl text-gray-700">Mungkin kamu belum mendaftar atau data yang dimasukkan kurang tepat</p>
                        </div>
                    </div>
                </div>
                <div id="found" style="display: none" class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-white">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase">Festival Lomba Seni Siswa Nasional @php echo date('Y') @endphp</p>
                                <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Data Ditemukan</h2>
                            </div>
                            <form id="validate_form" action="{{route('update_password')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="relative">
                                    <input type="hidden" name="user_id" id="user_id">
                                    <input type="hidden" name="email" id="emaill">
                                    <label class="font-medium text-gray-900">Kata Sandi Baru</label>
                                    <input id="password" name="password" data-parsley-minlength="8" required autocomplete="new-password" data-parsley-trigger="keyup" type="password" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50">
                                </div>
                                <div class="relative">
                                    <label class="font-medium text-gray-900">Ulangi Kata Sandi Baru</label>
                                    <input name="password_confirmation" data-parsley-equalto="#password" required data-parsley-trigger="keyup" type="password" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50">
                                </div>
                                <div class="relative mt-10">
                                    <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
    <script type="text/javascript">
            
        $(document).ready(function() {
    
            $('#form-certificate-check').submit(function(e) {
                e.preventDefault();
    
                var form = $(this)[0];
                var datas = new FormData(form);
                var method = document.getElementById("form-certificate-check").method;
                var url = document.getElementById("form-certificate-check").action;
    
                $.ajax({
                    url: url,
                    method: method,
                    data: datas,         
                    cache: false,
                    contentType: false,
                    processData: false, 
                    success: function (response) {
                        if (response == 0) {
                            document.getElementById('state').style.display = "none";
                            document.getElementById('found').style.display = "none";
                            document.getElementById('not_found').style.display = "block";
                            
                        } else {
                            document.getElementById('state').style.display = "none";
                            document.getElementById('found').style.display = "block";
                            document.getElementById('not_found').style.display = "none";
                            document.getElementById('user_id').value = response.id;
                            document.getElementById('emaill').value = response.email;
    
                        }
                    },
                    error: function (e) {
                        console.log("ERROR : ", e);
                    }
                })
                
            });
    
        });
    </script>
    </x-guest-layout>
    