<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <title>GotIt</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
      <!-- Google Fonts Roboto -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
      <!-- Custom styles -->
      <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      <section class="intro">
          <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg');">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(255,255,255,.6);">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card gradient-custom" style="border-radius: 1rem;">
                      <div class="card-body p-5 text-white">

                        <div class="my-md-5">

                          <div class="text-center pt-1">
                            <i class="fas fa-user-astronaut fa-3x"></i>
                            <h1 class="fw-bold my-5 text-uppercase">Phần Thường</h1>
                          </div>
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                          @if(session()->has('message'))
                              <script>
                                $(function() {
                                    $('#exampleModalLong').modal('show');
                                });
                              </script>
                          @endif
                          <form class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                            {{ csrf_field() }}
                            <div class="form-white mb-4">
                              <label class="fm-title-code" class="form-label" for="typeCode">Nhập mã dự thưởng</label>
                              <input type="text" id="typeCode" class="form-control form-control-lg" name="code" value="{{ old('code') }}" required autofocus/>
                            </div>

                            <div class="text-center py-5">
                              <!-- <button data-toggle="modal" data-target="#exampleModalLong" class="btn btn-light btn-lg btn-rounded px-5" type="submit">Tìm</button> -->
                              <button class="btn btn-light btn-lg btn-rounded px-5" type="submit">Tìm</button>
                            </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Result</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @if(session()->has('message'))
              {{ session()->get('message') }}
            @endif
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

