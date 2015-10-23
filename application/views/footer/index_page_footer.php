
<?php   $current= $this->router->fetch_method(); ?>
<script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js" id="script-resource-3"></script>
    <script src="<?php echo base_url();?>assets/js/joinable.js" id="script-resource-4"></script>
    <script src="<?php echo base_url();?>assets/js/resizeable.js" id="script-resource-5"></script>
    <script src="<?php echo base_url();?>assets/js/neon-api.js" id="script-resource-6"></script>
    <script src="<?php echo base_url();?>assets/js/cookies.min.js" id="script-resource-7"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" id="script-resource-8"></script>
    <?php if($current=="alumni" || $current=="students" ||$current=="faculty" ) {?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/selectboxit/jquery.selectBoxIt.css" id="style-resource-3">
    <script src="<?php echo base_url();?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
   
    <?php } ?>
    <?php if($current=="index") {?>
    <script src="<?php echo base_url();?>assets/js/neon-login.js" id="script-resource-9"></script>
    <?php } ?>
    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url();?>assets/js/neon-custom.js" id="script-resource-10"></script>
    <!-- Demo Settings -->
    <script src="<?php echo base_url();?>assets/js/neon-demo.js" id="script-resource-11"></script>
    <script src="<?php echo base_url();?>assets/js/neon-skins.js" id="script-resource-12"></script>
 <script src="<?php echo base_url();?>assets/js/jquery.cookie.js" id="script-resource-13"></script>
<?php if($current=="alumni" || $current=="students" ||$current=="faculty" ) {?>
 <script src="<?php echo base_url();?>assets/js/jquery.inputmask.bundle.min.js" id="script-resource-14"></script>

<script type="text/javascript">
     jQuery(function  ($){

      //Calls the selectBoxIt method on your HTML select box.
      $("select").selectBoxIt({
        // Hides the first select box option from appearing when the drop down is opened
    showFirstOption: false,
        // Uses the jQuery 'fadeIn' effect when opening the drop down
    showEffect: "fadeIn",

    // Sets the jQuery 'fadeIn' effect speed to 400 milleseconds
    showEffectSpeed: 400,

    // Uses the jQuery 'fadeOut' effect when closing the drop down
    hideEffect: "fadeOut",

    // Sets the jQuery 'fadeOut' effect speed to 400 milleseconds
    hideEffectSpeed: 400
      });
    })
</script>
<?php }?>
<?php if($current=="alumni") {?>
<script src="<?php echo base_url();?>assets/js/neon-register-alumni.js" id="script-resource-9"></script>
<?php }else if($current=="students"){ ?>
<script src="<?php echo base_url();?>assets/js/neon-register-students.js" id="script-resource-9"></script>
<?php }else if($current=="faculty"){ ?>
<script src="<?php echo base_url();?>assets/js/neon-register-faculty.js" id="script-resource-9"></script>
<?php }?>
    </body>

</html>