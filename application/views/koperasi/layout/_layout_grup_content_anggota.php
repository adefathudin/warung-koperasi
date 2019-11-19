<div class="card-body">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab" aria-controls="nav-admin" aria-selected="true">Admin</a>
      <a class="nav-item nav-link active" id="nav-member-tab" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="false">Member</a>
      <?php
      if ($status_member->status_user == 'admin'){ ?>
      <a class="nav-item nav-link" id="nav-request-tab" data-toggle="tab" href="#nav-request" role="tab" aria-controls="nav-request" aria-selected="false">Request</a>
      <a class="nav-item nav-link" id="nav-banned-tab" data-toggle="tab" href="#nav-banned" role="tab" aria-controls="nav-banned" aria-selected="false">Banned</a>
      <?php } ?>
    </div>
  </nav>
  <br>
  
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">      
      <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50%">User</th>
              <th>Joined</th>
            </tr>
          </thead>          
          <tbody id="data-admin">                 
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade show active" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">    
      <div class="table-responsive">
        <table class="table" id="dataTable1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50%">User</th>
              <th>Joined</th>
              <?php if ($status_member->status_user == 'admin'){
              echo "<th class='text-right'>Action</th>";} ?>
            </tr>
          </thead>          
          <tbody id="data-member">                 
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">      
      <div class="table-responsive">
        <table class="table" id="dataTable2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>User</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
            <tbody id="show_data">                 
            </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-banned" role="tabpanel" aria-labelledby="nav-banned-tab">    
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable3" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal Simpan</th>
              <th>Jenis Simpanan</th>
              <th>Periode</th>
              <th>Nominal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>< $simpan->tanggal_simpan ?></td>
              <td>< $simpan->jenis_simpanan ?></td>
              <td>< $simpan->periode ?></td>
              <td>< number_format($simpan->nominal,0, ".", ".") ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>