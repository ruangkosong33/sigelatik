<script src="{{asset('bk/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bk/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('bk/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('bk/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bk/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('bk/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('bk/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bk/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bk/plugins/moment/moment.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('bk/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
@stack('js_vendor')
@stack('toast')
<!-- AdminLTE App -->
<script src="{{asset('bk/dist/js/adminlte.js')}}"></script>

<script>
  $('.custom-file-input').on('change', function()
  {
    let filename=$(this).val().split('\\').pop();
    $(this)
      .next('.custom-file-label')
      .addClass('selected')
      .html(filename);
  });

  $.ajaxSetup({
    headers:
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function preview(target, image)
  {
    $(target)
      .attr('src', window.URL.createObjectURL(image))
      .show();
  }
</script>

@stack('script')
@stack('javascript')

