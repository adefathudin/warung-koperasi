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
      <?php 
        foreach ($list_data_all_user as $user){
          if ($data_grup_tmp->admin == $user->user_id){ ?>
      <div class="col-md-1">
          <a href='<?= base_url('user/'.$user->user_id)?>'>
            <img src='<?= base_url('assets/img/user/profile/'.$user->profil)?>' alt="Profile Picture" class="img-responsive img-thumbnail" style="max-height: 50px; max-width: 50px;">
          </a>                   
      </div>
      <div class="col-md-8">
        <a href='<?= base_url('user/'.$user->user_id)?>'>
          <?= $user->nama_lengkap ?>
        </a>
      </div>
      <div class="col-md-3 text-right">
        <button class="btn btn-default"><i class="fas fa-fw fa-user-plus"></i></button>
        <button class="btn btn-default"><i class="fas fa-fw fa-comment-dots"></i></button>
        <button class="btn btn-default"><i class="fas fa-fw fa-ban"></i></button>
      </div>
      <?php }} ?>
    </div>
    <hr>
  <div class="font-weight-bold">Member</div>
  <hr align="left" width="10%">
    <div class="row">
      <?php 
        if (!empty($data_grup_tmp)){
          if (strpos($data_grup_tmp->member,"|")){
            $member = explode("|", $data_grup_tmp->member);
            $count_member = count($member);
            $i = 0;
            while ($i < $count_member){              
              foreach ($list_data_all_user as $user){
              if ($user->user_id == $member[$i]){ 
                ?>
              <div class="col-md-1">
                <a href='<?= base_url('user/'.$user->user_id)?>'>
                  <img src='<?= base_url('assets/img/user/profile/'.$user->profil)?>' alt="Profile Picture" class="img-responsive img-thumbnail" style="max-height: 50px; max-width: 50px;">
                </a>                   
              </div>
              <div class="col-md-8">
                <a href='<?= base_url('user/'.$user->user_id)?>'>
                  <?= $user->nama_lengkap ?>
                </a>
              </div>
              <div class="col-md-3 text-right">
                <button class="btn btn-default"><i class="fas fa-fw fa-user-plus"></i></button>
                <button class="btn btn-default"><i class="fas fa-fw fa-comment-dots"></i></button>
                <button class="btn btn-default"><i class="fas fa-fw fa-ban"></i></button>
              </div>
            <?php 
                $i++;
              } 
            }
          }
        }
      }
      ?>
    </div>
    <hr>
</div>