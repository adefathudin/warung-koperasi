
    <div class="card shadow mb-4">
    
      <div class="card-header">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link nav_request active" id="nav-request-tab" data-toggle="tab" href="#nav-request" role="tab" aria-controls="nav-request" aria-selected="true">Request Upgrade</a>
            <a class="nav-item nav-link" id="nav-rekening-tab" data-toggle="tab" href="#nav-rekening" role="tab" aria-controls="nav-rekening" aria-selected="false">Full Service</a>
            <a class="nav-item nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">Basic Service</a>
            <a class="nav-item nav-link" id="nav-group-tab" data-toggle="tab" href="#nav-group" role="tab" aria-controls="nav-group" aria-selected="false">All User</a>
          </div>
        </nav>
      </div>      
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">          
            <div class="card-body">                  
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable_member_upgrade" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="80%">Nama</th>
                            <th>View</th>
                            </tr>
                        </thead>          
                        <tbody id="member_request_full">                 
                        </tbody>
                    </table>
                </div>
            </div> 
          </div>
          <div class="tab-pane fade" id="nav-rekening" role="tabpanel" aria-labelledby="nav-rekening-tab">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="50%">User</th>
                            <th>Joined</th>
                            </tr>
                        </thead>          
                        <tbody id="member_request_full">                 
                        </tbody>
                    </table>
                </div>
            </div> 
          </div>
          <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
            <div class="card-body">
               <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
               </div>
               <hr>
               <div class="chart-bar">
                  <canvas id="myBarChart"></canvas>
               </div>
            </div> 
          </div>
        </div>
    </div>