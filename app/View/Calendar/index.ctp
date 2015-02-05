<?php 

echo $this->Html->css('fullcalendar', array('inline' => false));
echo $this->Html->script(array('fullcalendar/lib/moment.min', 'fullcalendar/fullcalendar', 'fullcalendar/gcal'), array('inline' => false));
?>
<div id="left-calendar" class="span-12">
    <div id='calendar'></div>
</div>
<div id='right-calendar' class="span-10 last">
	<h1>Calendar</h1>
	<p>Please browse through the calendar on the left.  The details of the event will be listed below.</p> 

	<div id="calendar-loading-area">
        <div id = "new-page">
		</div>
	</div>
</div>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            googleCalendarApiKey: 'AIzaSyCHuETZw9XFCcN_Ttght4rARwHzwM18o1s',
            events: {
                googleCalendarId: 'pdptheta@gmail.com',
                color: '#777',
                className: 'get'
            },
            height: 550,
            eventClick: function(calEvent, jsEvent, view) {
                $('#new-page').html(
                        '<span class="ec-event-right">' + calEvent.title + '</span>' +
                        '<br/><br/>' + 
                        '<span id="calendar-date">' + 
                            calEvent.start.format('dddd, MMM DD [at] hh:mm A') + 
                            ' - ' + 
                            calEvent.end.format('hh:mm A') + 
                        '</span>' +
                        '<br/>' +
                        '<span id="calendar-location">' + 
                            (calEvent.location ? calEvent.location : '') +
                        '</span>' +
                        '<div id="calendar-description">' + 
                            (calEvent.description ? calEvent.description : '') + 
                        '</div>'
                    );
                return false;
            }
        });
    });
</script>
