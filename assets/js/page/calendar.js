
var today = new Date();
year = today.getFullYear();
month = today.getMonth();
day = today.getDate();
var calendar = $('#myEvent').fullCalendar({
  height: 'auto',
  defaultView: 'month',
  editable: true,
  selectable: true,
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listMonth'
  },
  events: [{
    title: "Solomon Andoh",
<<<<<<< HEAD
    start: new Date(year, month, day, 11, 30),
=======
    start: new Date(year, month, day, 8, 30),
>>>>>>> d4cbf2a9c05de32fe5bd02bc85e371bc7a160a1e
    end: new Date(year, month, day, 12, 0o0),
    backgroundColor: "#00bcd4"
  }]
});

