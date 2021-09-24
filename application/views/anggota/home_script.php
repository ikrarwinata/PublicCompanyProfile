<script type="text/javascript">
  $(function () {

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      // height: 500,
      contentHeight: 300,
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : ''
      },
      'themeSystem': 'bootstrap',
      //Random default events
      events    : [
        <?php foreach ($agenda_data as $key => $value): ?>
          <?php $color = $value->tampilkan?'#0073b7':'#f56954'; ?>
        {
          title          : "<?php echo $value->judul ?>",
          start          : new Date(<?php echo $value->tahun ?>, <?php echo ($value->bulan>=0?$value->bulan-1:$value->bulan) ?>, <?php echo $value->tanggal ?>),
          backgroundColor: "<?php echo $color ?>", //red
          borderColor    : "<?php echo $color ?>", //red
          url            : '<?php echo site_url("admin/Agenda/read/".$value->id) ?>',
          allDay         : true
        },
        <?php endforeach ?>
      ],
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!  
    });

    calendar.render();
    // $('#calendar').fullCalendar()
  })
</script>