<?php 
/*
      if ($data_grup_tmp->admin != 0){
      echo "<div class='collapse-header'><i class='fas fa-fw fa-users-cog'></i> Groups you manage</div>";
      
      if (strpos($data_grup_tmp->admin, "|")){
      $detail_grup = explode("|", $data_grup_tmp->admin);
      $count = count($detail_grup);
      $i = 0;
      while ($i < $count){
        foreach ($data_grup_tmp as $grup){
          if ($grup->grup_id == $detail_grup[$i]){
            
          echo $data_user->nama_lengkap;
            $i++;
          }
        }  
      }
    } else {
      foreach ($data_grup_tmp as $grup){
        if ($grup->admin == $data_user->user_id){
          echo $data_user->nama_lengkap;
        }
      }
    }
  }*/
    if (!empty($data_grup_tmp->member)){
      if (strpos($data_grup_tmp->member, "|")){
        $member_grup = explode("|", $data_grup_tmp->member);
        $count = count($member_grup);
        $i=0;
        while ($i < $count){
          foreach ($list_data_all_user as $user){
            if ($data_grup_tmp->member == $member_grup[$i]){
              echo $user->nama_lengkap;
              echo "<br>";
            }
          }
        }
      }
    }
  
?>

<div class="card-body">
<form class="form-row">
  <div class="form-group col-md-8">
    <h5 class="font-weight-bold text-md">132 Members</h5>
  </div>
  
  <div class="form-group col-md-3 text-right">
    <input type="password" class="form-control" id="inputPassword2" placeholder="Find a member">
  </div>
  <div class="form-group col-sm-1 text-right">
    <button class="btn btn-light form-contro"><i class="fas fa-fw fa-search"></i></button>
  </div>
</form>
  <div class="font-weight-bold">Admin</div>
  <hr align="left" width="10%">
    <div class="row">
      <div class="col-md-1">
      <?php 
      if ($data_grup_tmp->admin == $data_user->user_id){ ?>
      <a href='<?= base_url('user/'.$data_user->user_id)?>'>
        <img src='<?= base_url('assets/img/user/profile/'.$data_user->profil)?>' alt="Profile Picture" class="img-responsive img-thumbnail" style="max-height: 50px; max-width: 50px;">                   
      </div>
      <div class="col-md-8">
        <?= $data_user->nama_lengkap ?>
      </a>
      <?php } ?>
      </div>
      <div class="col-md-3 text-right">
        <button class="btn btn-default"><i class="fas fa-fw fa-user-plus"></i></button>
        <button class="btn btn-default"><i class="fas fa-fw fa-comment-dots"></i></button>
        <button class="btn btn-default"><i class="fas fa-fw fa-ban"></i></button>
      </a>
      </div>
    </div>
    <hr>
  <div class="font-weight-bold">Member</div>
  <hr align="left" width="10%">
    <div class="row">
      <div class="col-md-1">
      <?php 
      if ($data_grup_tmp->member == $data_user->user_id){ ?>
      <a href='<?= base_url('user/'.$data_user->user_id)?>'>
        <img src='<?= base_url('assets/img/user/profile/'.$data_user->profil)?>' alt="Profile Picture" class="img-responsive img-thumbnail" style="max-height: 50px; max-width: 50px;">                   
      </div>
      <div class="col-md-8">
        <?= $data_user->nama_lengkap ?>
      </a>
      <?php } ?>
      </div>
      <div class="col-md-3 text-right">
        <button class="btn btn-default"><i class="fas fa-fw fa-user-plus"></i></button>
        <button class="btn btn-default"><i class="fas fa-fw fa-comment-dots"></i></button>
        <button class="btn btn-default"><i class="fas fa-fw fa-ban"></i></button>
      </a>
      </div>
    </div>
    <hr>
</div>


  <script>
        // membuat objek elemen
        var hasil = document.getElementById("konten");

        // menampilkan output ke elemen hasil
        hasil.innerHTML = "<p>Ini adalah lapak</p>";
    </script>