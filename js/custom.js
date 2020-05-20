function printFunction() {
    window.print();
}

// Select picker/filter
$.fn.selectpicker.Constructor.BootstrapVersion = '4';

$.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
    icons: {
        time: 'fa fa-clock',
        date: 'fa fa-calendar',
        up: 'fa fa-arrow-up',
        down: 'fa fa-arrow-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-calendar-check',
        clear: 'fa fa-trash',
        close: 'fa fa-times'
    }
});


// DATE  VALIDATION ---> DATE PICKER
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY',
                useCurrent: true
            });
        });

$(function () {
            $('#datetimepicker2').datetimepicker({
                viewMode: 'months',
                format: 'MMMM',
                useCurrent: true
            });
        });
