@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugin.Select2',true)
@section('content_header')

@stop

@section('content')

@stop

@section('css')
<!-- ✅ Load CSS file for Select2 -->
<link
href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
rel="stylesheet"
/>

<!-- ✅ load jQuery ✅ -->
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
{{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> --}}
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>
 
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<style>
    .bg-nav{
        background: #685cb8 !important;
    }
    .nav-header, .nav-item > .nav-link{
        color: #fff !important;
    }
    .nav-item > .nav-link.active{
        background: #685cb8 !important;
    }
    .brand-text{
        color: #fff !important;
    }
    .logo-dashboard
    {
        font-size: 100px;
        color:rgba(255,255,255,0.5);
        margin-right: -30px;
        margin-bottom: -30px;

    }
    
</style>

@stop

@section('js')

    

   <script>
        var dateToday = new Date();
        // $(document).ready(function () {
        //     $(".select2").select2({ width: '100%' });
        // });
        $('.datepicker').daterangepicker({
            autoUpdateInput: false,
            
            autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD HH:mm:SS',
            },
            timePicker: false,
            minDate: "-7d"
        }).on("apply.daterangepicker", function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format));
    });
        $('.datepicker-no-limit').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD',
            }
        });
        $('.datetimepicker-no-limit').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD hh:ii',
            },
            timePicker: true

        });
        $('.datetimepicker').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD hh:ii',
            },
            timePicker: true,
            startDate: "-7d"

        });

        $(".delete").on('click', function() {
            return confirm('Are You Sure ?')
        });
        
        $('.numeric_only').bind('keyup paste', function(){this.value = this.value.replace(/[^0-9]/g, ''); });

        $(".curency").on("keyup",function(){
            var rgx = /^[0-9]*\.?[0-9]*$/;
            if($(this).val().match(rgx)){
                return true;
            }else{
                alert("Hanya bisa di input angka dan titik");
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        });

        function onlyNumbersWithDot(e) {
            var charCode;
            if (e.keyCode > 0) {
                charCode = e.which || e.keyCode;
            }
            else if (typeof (e.charCode) != "undefined") {
                charCode = e.which || e.keyCode;
            }
            if (charCode == 46)
                return true
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        


    </script>
@stop
