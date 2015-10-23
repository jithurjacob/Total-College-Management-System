
 <!-- Footer -->
 <footer class="main">
    <div class="pull-left"> 
    <a href="http://cep.ac.in" target="_blank">
    <strong>&copy; 2015  College of Engineering Poonjar</strong></a> 
    </div>
    <div class="pull-right"> 
     Developed by 
     <a href="https://www.facebook.com/jithurjacob007" target="_blank">Jithu R Jacob</a>
     </div>
      </footer>
<!--must-->
</div>
</div>
<script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js" id="script-resource-3"></script>
    <script src="<?php echo base_url();?>assets/js/joinable.js" id="script-resource-4"></script>
    <script src="<?php echo base_url();?>assets/js/resizeable.js" id="script-resource-5"></script>
    <script src="<?php echo base_url();?>assets/js/neon-api.js" id="script-resource-6"></script>
    <script src="<?php echo base_url();?>assets/js/cookies.min.js" id="script-resource-7"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" id="script-resource-8"></script>
    <script src="<?php echo base_url();?>assets/js/neon-login.js" id="script-resource-9"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url();?>assets/js/neon-custom.js" id="script-resource-10"></script>
    <!-- Demo Settings -->
    <script src="<?php echo base_url();?>assets/js/neon-demo.js" id="script-resource-11"></script>
    <script src="<?php echo base_url();?>assets/js/neon-skins.js" id="script-resource-12"></script>
 <script src="<?php echo base_url();?>assets/js/jquery.cookie.js" id="script-resource-13"></script>


<!---optional -->

<?php $current= $this->router->fetch_method(); ?>
<?php if($current=="index") {?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/fullcalendar-2/fullcalendar.min.css" >

<script src="<?php echo base_url();?>assets/js/daterangepicker/moment.min.js" ></script>
<script src="<?php echo base_url();?>assets/js/fullcalendar-2/fullcalendar.min.js" ></script>
<script src="<?php echo base_url();?>assets/js/neon-calendar-2.jss"></script>
<style type="text/css">
    .calendar-env .calendar-body{
        width: 100%;
        float: none;
    }
</style>


<script type="text/javascript">
    jQuery(function ($) {
     $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                right: 'month,agendaWeek,agendaDay today prev,next'
            },
            defaultDate: '2015-06-12',
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2015-06-01'
                },
                {
                    title: 'Long Event',
                    start: '2015-026-07',
                    end: '2015-026-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-06-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-06-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2015-06-11',
                    end: '2015-06-13'
                },
                {
                    title: 'Meeting',
                    start: '2015-06-12T10:30:00',
                    end: '2015-06-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2015-02-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2015-02-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2015-02-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2015-02-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2015-02-28'
                }
            ]
        });
        
    });
});
</script>
<?php }?>

<!--optional -->
    </body>

</html>