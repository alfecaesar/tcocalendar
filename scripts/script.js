document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('tcocalendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: scriptParams.time_zone,
        googleCalendarApiKey: scriptParams.google_api_key,
        headerToolbar: {
            start: 'prev,next today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay,listYear'
        },
        events: scriptParams.google_calendar_id
    });

    calendar.render();
});