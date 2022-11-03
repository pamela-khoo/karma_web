var dateToday = new Date(); 

function initDatepicker(){
    $('.datepicker').each(function() {
        var value = $(this).val();
        $(this).datetimepicker({
            format: 'YYYY-MM-DD',
            date: value,
            minDate: dateToday,
        });
		//$(this).prop('readonly',true);
        $(this).val(value);
    });
}

function initDateTimepicker(){
    $('.datetimepicker').each(function() {
        var value = $(this).val();
        if(value == '0000-00-00 00:00:00'){
            value = null;
        }
        $(this).datetimepicker({
            format: 'YYYY-MM-DD hh:mmA',
            date: value,
            icons: {
              time: 'far fa-clock',
              date: 'far fa-calendar-alt',
              up: 'fas fa-arrow-up',
              down: 'fas fa-arrow-down',
              previous: 'fas fa-chevron-left',
              next: 'fas fa-chevron-right',
              today: 'far fa-calendar-check',
              clear: 'far fa-trash-alt',
              close: 'fas fa-times'
            }
        });
        $(this).val(value);
    });
}

function initTimepicker(){
    $('.timepicker').each(function() {
        var value = $(this).val();
        $(this).datetimepicker({
            format: 'LT',
            date: value
        });
        $(this).val(value);
    });
}

function initYearpicker(){
    $('.yearpicker').each(function() {
        var value = $(this).val();
        $(this).datetimepicker({
            format: 'YYYY',
            date: value
        });
        $(this).val(value);
    });
}
