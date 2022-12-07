  <div class="col-md-12">
      <div class="page-header card">
          <div class="card-block">
              <h5 class="m-b-10">Tài khoản</h5>

              <ul class="breadcrumb-title b-t-default p-t-10">
                  <li class="breadcrumb-item">
                      <a href="{{ route('adminDashboard') }}"> <i class="fa fa-home"></i> Tài khoản </a>
                  </li>


              </ul>
          </div>
      </div>

  </div>

  <div class="col-md-6 col-xl-3">
      <div class="card bg-c-blue order-card">
          <div class="card-block">
              <h6 class="m-b-20">Tổng số tài khoản</h6>
              <h2 class="text-right"><i class="ti-world f-left"></i><span>{{ $totalAccount }}</span></h2>

          </div>
      </div>
  </div>
  <div class="col-md-6 col-xl-3">
      <div class="card bg-c-green order-card">
          <div class="card-block">
              <h6 class="m-b-20">Tài khoản đã kích hoạt</h6>
              <h2 class="text-right"><i class="ti-check-box f-left"></i><span>{{ $totalAccountActive }}</span></h2>

          </div>
      </div>
  </div>
  <div class="col-md-6 col-xl-3">
      <div class="card bg-c-yellow order-card">
          <div class="card-block">
              <h6 class="m-b-20">Tài khoản chưa kích hoạt</h6>
              <h2 class="text-right"><i
                      class="ti-layout-placeholder f-left"></i><span>{{ $totalAccountUnActive }}</span>
              </h2>

          </div>
      </div>
  </div>
  <div class="col-md-6 col-xl-3">
      <div class="card bg-c-pink order-card">
          <div class="card-block">
              <h6 class="m-b-20">Tài khoản bị khóa</h6>
              <h2 class="text-right"><i class="ti-na f-left"></i><span>{{ $totalAccountBlock }}</span></h2>

          </div>
      </div>
  </div>

  <div class="col-sm-12">
      <div class="card tabs-card">
          <div class="card-block p-0">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs md-tabs" role="tablist">
                  <li class="nav-item complete">
                      <a class="nav-link" data-toggle="tab" href="#home3" role="tab" aria-expanded="false"><i
                              class="fa fa-home"></i>Tài khoản User</a>
                      <div class="slide"></div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-expanded="false"><i
                              class="fa fa-key"></i>Tài khoản Admin</a>
                      <div class="slide"></div>
                  </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content card-block">
                  <div class="tab-pane active" id="home3" role="tabpanel" aria-expanded="false">
                      <div class="dstaikhoan" id="dstaikhoan" >
                          @include('admin.taikhoan.dstaikhoan')
                      </div>
                      <div class="text-center phantrang" id="phantrang">
                          {!! $lstAccountUser->links() !!}
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
