<script src="{{ asset('assets/webpannel/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/webpannel/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/webpannel/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/webpannel/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/webpannel/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/webpannel/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/webpannel/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/webpannel/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/webpannel/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/webpannel/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/webpannel/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('assets/webpannel/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/webpannel/js/setting-demo.js') }}"></script>
<script src="{{ asset('assets/webpannel/js/demo.js') }}"></script>

{{-- datatable --}}
<script>
    $(document).ready(function() {
        $("#datatables").DataTable({});
    });
</script>

{{-- Text Editor --}}
<script src="{{ asset('assets/ckeditor5/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('.editor'), {
            removePlugins: ['Title']
        })
    .catch(error => {
        console.error(error);
    });
</script>

<!-- select 2 searchable -->

<script src="{{ asset('assets/webpannel/js/plugin/select2/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.select2-me').select2();

    });
</script>
