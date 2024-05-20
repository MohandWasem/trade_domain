<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © OseEgypt.com 2024</span>
    </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
    
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script> --}}
    <!-- inject:js -->
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/misc.js')}}"></script>
    <script src="{{asset('admin/js/file-upload.js')}}"></script>
    
     <!-- DataTable -->
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
      <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
      <script>
          new DataTable('#example');
    
      </script>
    @stack('scripts')
    </body>
    </html>