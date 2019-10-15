          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="border-bottom text-center pb-4">
                    <img src="<?php echo base_url('assets/img/profil/'.$data_user_tmp->profil) ?>" alt="profile" class="img-thumbnail img-responsive" width="50%">
                    <div class="mb-3"><br>
                      <h3><?php echo $data_user_tmp->nama_lengkap;
                            if ($data_user->type == 'Full Service') {
                            echo " <i class='far fa-fw fa-check-circle text-primary'></i>";} ?>
                      </h3>
                      <div class="d-flex align-items-center justify-content-center">
                        <h5 class="mb-0 mr-2 text-muted"><?php echo $data_user_tmp->type ?></h5>
                        <div class="br-wrapper br-theme-css-stars"><select id="profile-rating" name="rating" autocomplete="off" style="display: none;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a></div></div>
                      </div>
                    </div>
                    <p class="w-75 mx-auto mb-3">
                    <?= $data_user_tmp->about ?>
                    </p>
                   </div>
                </div>
                <div class="col-lg-6">
                  <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                    <div class="text-center mt-4 mt-md-0">
                      <?php                       
                      if ($data_user_tmp->user_id != $data_user->user_id){
                        echo"
                      <button class='btn btn-outline-primary'>Message</button>
                      <button class='btn btn-primary'>Add Friend</button>";}
                      else {
                        echo"
                      <a href='#' data-toggle='modal' data-target='#settingUserModal'>
                      <button class='btn btn-outline-secondary'><i class='fas fa-fw fa-cog'></i> Setting</button></a>";
                      } ?>
                    </div>
                  </div>
                  <hr>
                  <div class="profile-feed">   
                <!-- DATA INFORMASI -->                   
                  <div class="py-4">
                    <p class="clearfix">
                      <span class="float-left">
                        <i class="fas fa-fw fa-user"></i>
                        Joined
                      </span>
                      <span class="float-right text-muted">
                      <?php echo $data_user_tmp->joined ?>
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        <i class="fas fa-fw fa-phone"></i>
                        No. HP
                      </span>
                      <span class="float-right text-muted">
                      <?php echo $data_user_tmp->nomor_hp ?>
                      </span>
                    </p>
                    <?php                       
                      if ($data_user_tmp->user_id == $data_user->user_id){
                        echo"                        
                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-envelope'></i>
                      E-Mail
                    </span>
                    <span class='float-right text-muted'>".
                    $data_user_tmp->email."
                    </span>
                    </p>

                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-calendar'></i>
                      Tempat dan Tanggal Lahir
                    </span>
                    <span class='float-right text-muted'>".
                    $data_user_tmp->tempat_lahir.", ".$data_user_tmp->tanggal_lahir."
                    </span>
                    </p>

                    <p class='clearfix'>
                    <span class='float-left'>
                      <i class='fas fa-fw fa-male'></i>
                      Jenis Kelamin
                    </span>
                    <span class='float-right text-muted'>".
                    $data_user_tmp->jenis_kelamin."
                    </span>
                    </p>
                    ";}
                  ?>
                    <p class="clearfix">
                      <span class="float-left">
                        <i class="fas fa-fw fa-map-marker"></i>
                        Alamat
                      </span>
                      <span class="float-right text-muted">
                      <?php echo $data_user_tmp->alamat ?>
                      </span>
                    </p>
                  </div>
                  <!-- END DATA INFORMASI -->
                  </div>
                </div>
              </div>
            </div>
          </div>




