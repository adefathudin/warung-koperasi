<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="saldo_akhir"><i class="fas fa-fw fa-circle-notch fa-spin"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Grup</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="saldo_koperasi"><i class="fas fa-fw fa-circle-notch fa-spin"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Saldo Rekening</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Omset</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (empty($user_grup->total_grup) or empty($user_grup)) { echo 0;} else echo $user_grup->total_grup; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<div class="row">

  <div class="col-lg-9 mb-4 konten_admin">

  </div>

  <div class="col-lg-3 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        Filter by
      </div>
      <div class="card-body small">   
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

          <a class="nav-link active" id="report" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Report</a>

          <a class="nav-link" id="member" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">User</a>

          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>

          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>

        </div>
      </div>
    </div>
  </div>

</div><!--END ROW-->

<!-- Jika login sebagai admin, maka fungsi ini akan diaktifkan -->

<script>

$("#report").click(function(){
$(".konten_admin").load("<?= base_url('admin/dashboard/report')?>");
  }),

$("#member").click(function(){
$(".konten_admin").load("<?= base_url('admin/dashboard/member')?>");

    $.ajax({
    type  : 'POST',
    url   : '<?php echo base_url()?>profile/user/member_request_full_service',
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'
              +data[i].nama_lengkap+
            '</td>'+
            '<td>'+
            '<a href="javascript:;" data="'+data[i].user_id+'" class="btn btn-info approve_member_full"><i class="fas fa-fw fa-info-circle"></i> Detail</a>'+
            '</td>'+
            '</tr>';
        }
      $('#member_request_full').html(html);
      return false;
    }
  });
}),         

//detail detail user
$(document).on('click','.approve_member_full',function(){
    var user_id=$(this).attr('data');
        $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url()?>profile/user/detail_member_request_full_service',
        data  : {user_id:user_id},
        async : true,
        dataType : 'json',
        success : function(data){
          var html = '';
            html += 
            '<div class="modal-body">'+
              '<table class="table table-responsive">'+
                '<tbody>'+
                  '<tr><td><i class="fas fa-fw fa-fingerprint"></i></td><td>'+data.user_id+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-signature"></i></td><td>'+data.nama_lengkap+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-baby"></i></td><td>'+data.tempat_lahir+', '+data.tanggal_lahir+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-venus-mars"></i></td><td>'+data.jenis_kelamin+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-at"></i></td><td>'+data.email+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-phone"></i></td><td>'+data.nomor_hp+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-map-marker-alt"></i></td><td>'+data.alamat+'</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-dollar-sign"></i></td><td>'+data.nomor_rekening+' ('+data.nama_bank+')</td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-address-card"></i></td><td><img src="<?= base_url('assets/img/user/ktp/')?>'+data.ktp+'"/></td></tr>'+
                  '<tr><td><i class="fas fa-fw fa-user"></i></td><td><img src="<?= base_url('assets/img/user/profile/')?>'+data.profil+'"/></td></tr>'+
                '</tbody>'+
              '</table>'+
            '</div>'+
            '<div class="modal-footer btn_approve_reject">'+
              '<button class="btn btn-danger" data="'+data.user_id+'" id="btn_reject_full_service"><i class="fas fa-fw fa-times-circle"></i> Reject</button>'+
              '<button class="btn btn-primary" data="'+data.user_id+'" id="btn_approve_full_service"><i class="fas fa-fw fa-check-circle"></i> Upgrade</button>'+
            '</div>'  
                  ;
            
            $('#detail_member_full').html(html);
          }
        });
    $('#approve_member_full_modal').modal('show');
});

</script>
