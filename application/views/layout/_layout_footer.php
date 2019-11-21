

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Menarik file modal -->
  <?php $this->load->view('layout/module/_layout_modal'); ?>
  
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <!--<script src="<?php echo base_url('assets/vendor/jquery/jquery.rating.js')?>"></script>-->
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.validate.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

  <!-- Page level plugins -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/touch-rating.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.star-rating-svg.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>
  <script src="<?php echo base_url('assets/js/webcam.min.js')?>"></script>
  <!-- Configure a few settings and attach camera -->  
  <script src="<?php echo base_url('assets/js/getWebcam.js')?>"></script>

  <script>
  var JS = {
    init: function(){
      setInterval(function(){ notifikasi(); }, 3000);
      //notifikasi();
      request_grup();
      member_grup();
      admin_grup();
      saldo();
      //jika tombol cashout diklik
      $('#formCashOut').on('submit',function(e) { 
        var nominal = $('#nominalCashout').val();
        if (!confirm("Anda yakin ingin melakukan tarik tunai sebesar "+nominal+"?")){
          return false;
        }
          $('#btnKonfirmasiCashout').find('i').removeClass('fa-money-bill-wave').addClass('fa-circle-notch fa-spin');
          $('#btnKonfirmasiCashout').prop('disabled', true);   
        }),
        
      //Jika telah selesai cashout
      <?php if($this->session->flashdata('pesan_cashout')){ ?>
        Swal.fire({
          position: 'center',
          title: 'Cash Out Sukses!',
          icon: 'success',
          showConfirmButton: true,
          text: '<?= $this->session->flashdata('pesan_cashout') ?>'
        }),
      <?php } ?>

      //Jika telah selesai topup
      <?php if($this->session->flashdata('pesan_cash_in')){ ?>
        Swal.fire({
          position: 'center',
          title: 'Top Up Berhasil!',
          icon: 'success',
          showConfirmButton: true,
          text: '<?= $this->session->flashdata('pesan_cash_in') ?>'
        }),
      <?php } ?>

      //----------------------------------------
      
      //jika checkbox pinjam dicentang
      $('#inlineFormCheck').click(function(){
          $('#btn-pinjam').attr('disabled', !this.checked);
      }),

      //JIka pencarian grup tanpa bintang dicentang
      $('#cari_tanpa_bintang').click(function(){
        $('#filterstar').attr('disabled', this.checked);
        $('#filterstar').valu('', this.checked);
      }),

      //auto kalkulasi cicilan pembayaran
      $("#tenor").change(function() {
        var $tenor = $("#tenor option:selected").val();
        var $nominal = $("#nominal_pinjaman").val();
        var $cicilan = $nominal / $tenor;
          $("#kalkulasi_cicilan").val("Rp. "+Math.ceil($cicilan)+ " per bulan");
      }),

      //Ucapan Welcome ketika pertama kali daftar
      <?php if($this->session->flashdata('welcome_new_member')){ ?>
        Swal.fire({
          title: 'Selamat Datang di WarungKoperasi',
          text: '<?= $this->session->flashdata('welcome_new_member') ?> ',
          imageUrl: '<?= base_url('assets/img/logo.png')?>',
          imageWidth: 200,
          imageHeight: 200,
          imageAlt: 'WarungKoperasi',
        }),
      <?php } ?>

      //Jika telah selesai update identitas diri
      <?php if($this->session->flashdata('update_identitas')){ ?>
        Swal.fire({
          position: 'center',
          icon: 'success',
          text: '<?= $this->session->flashdata('update_identitas') ?>',
          showConfirmButton: false,
          timer: 1900
        }),
      <?php } ?>

      //jika tombol join grup diklik
      $('#join_grup').click(function(){        
        $.ajax({
          type: 'POST',
          url: '<?= base_url("koperasi/grup/join")?>',
          data: {
              user_id: '<?= $user_id ?>',
              grup_id: '<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>',
              request_grup: '<?php if (isset($data_grup_tmp->request)){echo ($data_grup_tmp->request);} ?>'
          },
          success: function (data) {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              text: 'Permintaan join grup telah terkirim',
              showConfirmButton: false,
              timer: 1300
            }),
              $('#join_grup').html("<i class='fas fa-fw fa-clock'></i> Requested");
              $('#join_grup').prop('disabled', true)
          },
          error: function (data) {
            alert("ada sesuatu yang salah");
          }
        })      
      }),

      $('#notifikasi_id').click(function(){
        alert("assu");
      }),

      //jika range bintang dipilih
      $("#filterstar").on('input', function(){
        $("#star").html($(this).val());
      });
    }
  }
  $(document).ready(function(){
    JS.init();
  });
</script>

<script>
  function upload(){
    var foto_ktp = document.getElementById("imageprevKTP").src;
    var foto_profile = document.getElementById("imageprevProfile").src;
    document.getElementById("value_ktp").value = foto_ktp;
    document.getElementById("value_profile").value = foto_profile;
  }
  
  function closeKamera(){
    Webcam.reset();
  }

  function getCashOut(objButton){  
    $('#konfirmasiCashout').show();
      document.getElementById("nominalCashout").value = objButton.value;  
    $('#btnKonfirmasiCashout').prop("disabled", false);
  }   
  
  function getTopup(objButton){  
    document.getElementById("nominalTopup").value = objButton.value;
  }   

  function verifikasi_email(){
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
      });
    };
   
  //tampil anggota grup request
  function request_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/grup/list_request',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a></td>'+
            '<td style="text-align:right;">'+
                '<button class="btn btn-default text-primary" id="accept_grup" data="'+data[i].id+'"><i class="far fa-fw fa-check-circle"></i> Accept</button>'+' '+
                '<button class="btn btn-default text-danger"><i class="far fa-fw fa-times-circle"></i> Reject</button>'
            '</td>'+
            '</tr>';
        }
        $('#show_data').html(html);
      }
    });
  };

  //PROSES ACC MEMBER KE GRUP 
  $(document).on('click', '#accept_grup', function() {
    var id = $(this).attr('data');
    $.ajax({
          type: 'POST',
          url: '<?= base_url("koperasi/grup/accept")?>',
          data: {id:id},
          success: function (data) {
            request_grup();
            member_grup();
          },
          error: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              text: 'Ada sesuatu yang salah saat acc member',
              showConfirmButton: false,
              timer: 1300
            })
          }          
        })
        return false;
  });

  
  //tampil anggota grup
  function member_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/grup/list_member',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a></td>'+
            '<td>'+data[i].joined+' days ago</td>'+
            /*
            Jika statusnya adalah admin, maka tampilkan action untuk kick member
            */
            <?php            
            if (!empty($status_member)){
            if ($status_member->status_user == 'admin'){ ?>
            '<td style="text-align:right;">'+
                '<button class="btn btn-default text-danger" id="kick_member" data="'+data[i].id+'"><i class="fas fa-fw fa-sign-out-alt"></i> Kick Out</button>'+
                '<button class="btn btn-default text-danger" id="block_member" data="'+data[i].id+'"><i class="fas fa-fw fa-ban"></i> Block</button>'
            '</td>'+
            <?php }} ?>

            '</tr>';
        }
        $('#data-member').html(html);
      }
    });
  };

  
  //PROSES KICK OUT MEMBER 
  $(document).on('click', '#kick_member', function() {
    var id = $(this).attr('data');
    $.ajax({
          type: 'POST',
          url: '<?= base_url("koperasi/grup/kick")?>',
          data: {id:id},
          success: function (data) {
            member_grup();
            request_grup();
          },
          error: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              text: 'Ada sesuatu yang salah saat kick out member',
              showConfirmButton: false,
              timer: 1300
            })
          }          
        })
        return false;
  });

  
  //tampil admin grup
  function admin_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/grup/list_admin',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td>'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a></td>'+
            '<td>'+data[i].joined+' days ago</td>'+
            '</tr>';
        }
        $('#data-admin').html(html);
      }
    });
  };

  //tampil notifikasi
  function notifikasi(){
    var user_id =  "<?= $user_id ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>dashboard/notifikasi',
    data  : {user_id:user_id},
    async : true,
    dataType : 'json',
    success : function(data){
      
      //jika notifikasi yang belum dibaca lebih dari 0

      if (data.length > 0){
      $('#count_notifikasi').text(data.length);
      } else {
        $('#count_notifikasi').text("");
      }
      var html = '';
      var i;
        for(i=0; i < data.length; i++){
          html += 
            '<a class="dropdown-item d-flex align-items-center detail_notifikasi" data="'+data[i].notifikasi_id+'" href="javascript:;">'+
              '<div>'+
                '<div class="small text-gray-500">'+data[i].tanggal+'</div>'+
                '<span class="font-weight-bold">'+data[i].judul+'</span>'+
              '</div>'+
            '</a>';
        }
        $('.notifikasi').html(html);
      }
    });
  };


  //detail notifikasi modal
  $('.notifikasi').on('click','.detail_notifikasi',function(){
      var id=$(this).attr('data');
          $.ajax({
          type  : 'GET',
          url   : '<?php echo base_url()?>dashboard/notifikasi_by_id',
          data  : {id:id},
          async : true,
          dataType : 'json',
          success : function(data){
              $('#judul_notifikasi_modal').text(data.judul);
              $('#tanggal_notifikasi_modal').text(data.tanggal);
              $('#isi_notifikasi_modal').text(data.isi);
              $('#link_notifikasi_modal').html('<a class="btn btn-light" href="'+data.link+'">Check <i class="fas fa-fw fa-sign-in-alt"></i></a>');
                  $.ajax({
                  type  : 'GET',
                  url   : '<?php echo base_url()?>dashboard/update_baca_notifikasi',
                  data  : {id:id},
                  async : true,
                  dataType : 'json',
                  success : function(data){
                    }
                  });
            }
          });
      $('#notifikasi_modal').modal('show');
  });


  //tampil saldo user
  function saldo(){
    var user_id =  "<?= $user_id ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>dashboard/saldo',
    data  : {user_id:user_id},
    async : true,
    dataType : 'json',
    success : function(data){
        $('#saldo_akhir').text(data.saldo_akhir);
        $('#saldo_koperasi').text(data.saldo_koperasi);
      }
    });
  };

  //jika tombol approve full service ditekan
        
  $(document).on('click', '#btn_approve_full_service', function(){
          var user_id=$(this).attr('data');
          if (!confirm("User kan diupgrade menjadi member Full Service?")){
            return false;
          }
          $.ajax({
          type  : 'GET',
          url   : '<?php echo base_url()?>profile/user/approve_member_full_service',
          data  : {user_id:user_id},
          success : function(data){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Upgrade Member Berhasil',
              showConfirmButton: false,
              timer: 1300
            })
            }
          });
          
          $('#approve_member_full_modal .close').click();
          $('#member').click();

        });


        //jika tombol reject full service ditekan
        
        $(document).on('click', '#btn_reject_full_service', function(){
          var user_id=$(this).attr('data');
          if (!confirm("Pengajuan upgrade user ini akan ditolak?")){
            return false;
          }
          $.ajax({
          type  : 'GET',
          url   : '<?php echo base_url()?>profile/user/reject_member_full_service',
          data  : {user_id:user_id},
          success : function(data){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Pengajuan Upgrade Member Berhasil Ditolak',
              showConfirmButton: false,
              timer: 1300
            })
            }
          });
          
          $('#approve_member_full_modal .close').click();
          $('#member').click();

        });
  
</script>


<?php
if (!empty($_GET['order_id'])){
  $order_id = $_GET['order_id'];
  $status = $_GET['status_code'];
    if (!empty($order_id and !empty($status))){
      if ($status == 200){ ?>
      <script>
        $.ajax({
        type  : 'POST',
        url   : '<?php echo base_url()?>rekening/topup/update',
        data  : {order_id:'<?= $order_id ?>'},
        success : function(data){          
          <?php
            $this->session->set_flashdata('pesan_cash_in', 'Topup saldo berhasil dilakukan'); 
            header("Location:".base_url('rekening/topup'));
          ?>
          },
          error: function (data) {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              text: 'Ada sesuatu yang salah saat topup saldo',
              showConfirmButton: false,
              timer: 1300
            })
          }  
        });
      </script>
        <?php
      }      
    }
  }
?>

<!-- Jika login sebagai admin, maka fungsi ini akan diaktifkan -->

<?php 
  if ($user_id == 'a1bdc221d56fddfba202bd448fe4dbfb'){ ?>

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
    
<?php } ?>

    <script>        
        
    </script>
  </body> 
</html>