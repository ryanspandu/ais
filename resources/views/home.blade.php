<!DOCTYPE html>
<html>
<head>
    <title>Programmer Test - Ryan Pandu</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <div class="main-nav">
        <div class="content">
            <img src="{{ asset('logo.png') }}" width="40px"/>
            <p class="mb-0 fw-bold text-white ms-3">Programmer Test</p>
        </div>
    </div>
    <div class="card">
        <div class="head">
            <div class="d-flex flex-row align-items-center">
                <div class="photo"></div>
                <p class="mb-0 ms-2 text-white fw-bold">Ryan Pandu Prasetya</p>
            </div>
            <div class="d-flex flex-row align-items-center">
                <a href="{{ route('cv.download') }}" class="btn btn-danger me-2">Download CV</a>
                <a href="https://afterryan.com/portofolio" target="_blank" class="btn btn-primary">Portfolio</a>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Question 1</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Question 2</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Question 3</button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <img src="{{ asset('1.png') }}" width="100%"/>
                    <hr class="w-100"/>
                    <p class="fw-bold">Answer :</p>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Ready</th>
                                <th>On Hold</th>
                                <th>Delivered</th>
                                <th>Packing</th>
                                <th>Sent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            
                                $fix_data = []; 
                                $a = 1; 
                                $b = 1; 
                                $v = 0;
                           
                                $apple_ready = 0;
                                $apple_delivered = 0;
                                $apple_sent = 0;
                                $apple_onhold = 0;
                                $apple_packing = 0;

                                $pinapple_ready = 0;
                                $pinapple_delivered = 0;
                                $pinapple_sent = 0;
                                $pinapple_onhold = 0;
                                $pinapple_packing = 0;
                                
                            @endphp
                            @foreach($data as $d)
                                {{-- Get data from barcode 1111 only --}}
                                @if($d['barcode'] == 1111)
                                    
                                    @php 
                                        $fix_data[0]['barcode'] = 1111;
                                        if($a == 1){
                                            $fix_data[0]['total_harga'] = $d['price'];
                                        }else{
                                            $fix_data[0]['total_harga'] = $fix_data[0]['total_harga'] + $d['price'];
                                        }

                                        if($d['status'] == 'READY'){
                                            $fix_data[0]['ready'] = $apple_ready + 1;
                                            $apple_ready = $fix_data[0]['ready'] ;
                                        }else if($d['status'] == 'DELIVERED'){
                                            $fix_data[0]['delivered'] = $apple_delivered + 1;
                                            $apple_delivered = $fix_data[0]['delivered'] ;
                                        }else if($d['status'] == 'ONHOLD'){
                                            $fix_data[0]['onhold'] = $apple_onhold + 1;
                                            $apple_onhold = $fix_data[0]['onhold'] ;
                                        }else if($d['status'] == 'PACKING'){
                                            $fix_data[0]['packing'] = $apple_packing + 1;
                                            $apple_packing = $fix_data[0]['packing'] ;
                                        }else if($d['status'] == 'SENT'){
                                            $fix_data[0]['sent'] = $apple_sent + 1;
                                            $apple_sent = $fix_data[0]['sent'] ;
                                        }

                                        $fix_data[0]['ready'] = $apple_ready;    
                                        $fix_data[0]['packing'] = $apple_packing;    
                                        $fix_data[0]['delivered'] = $apple_delivered;    
                                        $fix_data[0]['onhold'] = $apple_onhold;    
                                        $fix_data[0]['sent'] = $apple_sent;      
                                    
                                        $fix_data[0]['jumlah'] = $a++;
                            
                                    @endphp
                                @endif
                                {{-- Get data from barcode 1122 only --}}
                                @if($d['barcode'] == 1122)
                                    @php 
                                        $fix_data[1]['barcode'] = 1122;
                                        if($b == 1){
                                            $fix_data[1]['total_harga'] = $d['price'];
                                        }else{
                                            $fix_data[1]['total_harga'] = $fix_data[1]['total_harga'] + $d['price'];
                                        }

                                        if($d['status'] == 'READY'){
                                            $fix_data[1]['ready'] = $pinapple_ready + 1;
                                            $pinapple_ready = $fix_data[1]['ready'] ;
                                        }else if($d['status'] == 'DELIVERED'){
                                            $fix_data[1]['delivered'] = $pinapple_delivered + 1;
                                            $pinapple_delivered = $fix_data[1]['delivered'] ;
                                        }else if($d['status'] == 'ONHOLD'){
                                            $fix_data[1]['onhold'] = $pinapple_onhold + 1;
                                            $pinapple_onhold = $fix_data[1]['onhold'] ;
                                        }else if($d['status'] == 'PACKING'){
                                            $fix_data[1]['packing'] = $pinapple_packing + 1;
                                            $pinapple_packing = $fix_data[1]['packing'] ;
                                        }else if($d['status'] == 'SENT'){
                                            $fix_data[1]['sent'] = $pinapple_sent + 1;
                                            $pinapple_sent = $fix_data[1]['sent'] ;
                                        }     

                                        $fix_data[1]['ready'] = $pinapple_ready;    
                                        $fix_data[1]['packing'] = $pinapple_packing;    
                                        $fix_data[1]['delivered'] = $pinapple_delivered;    
                                        $fix_data[1]['onhold'] = $pinapple_onhold;    
                                        $fix_data[1]['sent'] = $pinapple_sent;                           
                                    
                                        $fix_data[1]['jumlah'] = $b++;
                                    @endphp
                                @endif
                            @endforeach

                            @foreach($fix_data as $d)
                            <tr>
                                <td>{{ $d['barcode'] }}</td>
                                <td>{{ $d['jumlah'] }}</td>
                                <td>{{ $d['total_harga'] }}</td>
                                <td>{{ $d['ready'] }}</td>
                                <td>{{ $d['onhold'] }}</td>
                                <td>{{ $d['delivered'] }}</td>
                                <td>{{ $d['packing'] }}</td>
                                <td>{{ $d['sent'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="w-100 bg-dark px-3 py-2">
                        <a href="https://github.com/ryanspandu/ais/blob/master/resources/views/home.blade.php" class="text-success" target="_blank">Source Code</a> 
                        <i class="bi bi-arrow-right text-success"></i>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <img src="{{ asset('2.png') }}" width="100%"/>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <img src="{{ asset('3.png') }}" width="100%"/>
                </div>
              </div>
        </div>
    </div>
</body>
<!-- Custom JS -->
<script>
$(document).ready(function () {
    $('#table1').DataTable();
});
</script>
</html>