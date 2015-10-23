var neonRegister = neonRegister || {};;(function($, window, undefined) {    "use strict";    $(document).ready(function() {    	        neonRegister.$container = $("#form_register");        neonRegister.$steps = neonRegister.$container.find(".form-steps");        neonRegister.$steps_list = neonRegister.$steps.find(".step");        neonRegister.step = 'step-1';        neonRegister.$container.validate({            rules: {                name: {                    required: true                },                email: {                    required: true,                    email: true                },                mobno: {                    required: true,                    minlength:10,                    maxlength:10                },                dob: {                    required: true,                    date:true                },                 branch: {                 	min:1,                    required: true                },                 lateral: {                     required: true                },                yearofpass: {                    min:2000,                    max:2025,                     minlength:4,                    maxlength:4,                     required: true                },                username: {                	minlength:8,                    required: true                },                password: {                	minlength:8,                    required: true                },                repassword: {                    required: true,                    equalTo:password                },            },            messages: {                email: {                    email: 'Invalid E-mail.'                },                repassword: {                    repassword: 'Password and Retype Password donot match.'                },                branch:{                	branch:'Enter branch'                },                password:{                	password:'Minimum 8 character length'                },username:{                	username:'Minimum 8 character length'                                },mobno:{                    mobno:'Enter 10 digit mobile number',                    minlength:'Enter 10 digit mobile number',                    maxlength:'Enter 10 digit mobile number'                },dob:{                    dob:'Enter a valid date'                },yearofpass:{                    minlength:'Enter 4 digit year of passing out',                    maxlength:'Enter 4 digit year of passing out'                                }            },            highlight: function(element) {                $(element).closest('.input-group').addClass('validate-has-error');            },            unhighlight: function(element) {                $(element).closest('.input-group').removeClass('validate-has-error');            },            submitHandler: function(ev) {                $(".login-page").addClass('logging-in');                neonRegister.setPercentage(30, function() {                    neonRegister.setPercentage(98, function() {                        $.ajax({                            url: baseurl + 'index.php/register/alumni_register/',                            method: 'POST',                            dataType: 'json',                            data: {                            	                                name: $("input#name").val(),                                email: $("input#email").val(),                                mobno: $("input#mobno").val(),                                dob: $("input#dob").val(),                                branch: $("select#branch").val(),                                admnno: $("input#admnno").val(),                                regno: $("input#regno").val(),                                yearofpass: $("input#yearofpass").val(),                                lateral: $("select#lateral").val(),                                username: $("input#username").val(),                                                                password: $("input#password").val(),                                 'jithu_csrf_token':  $.cookie('jithu_csrf_cookie')                            },                            error: function() {                                alert("An error occoured!");                            },                            success: function(response) {                                var status = response.login_status;                                neonRegister.setPercentage(100);                                if(status=='success'){                                setTimeout(function() {                                    $(".login-page .login-header .description").slideUp();                                    neonRegister.$steps.slideUp('normal', function() {                                        $(".login-page").removeClass('logging-in');                                        $(".form-register-success").slideDown('normal');                                    });                                }, 1000);                            }else{                            	alert('Registration failed');                            }                            }                        });                    });                });            }        });        neonRegister.$steps.find('[data-step]').on('click', function(ev) {            ev.preventDefault();            var $current_step = neonRegister.$steps_list.filter('.current'),                next_step = $(this).data('step'),                validator = neonRegister.$container.data('validator'),                errors = 0;            neonRegister.$container.valid();            //alert(next_step);                        if (next_step=='step-2') {            	if($("input#email").val()!="" && $("input#username").val()!="")            	// 	do{            	// 		console.log(1);            	// 		var finished=false,started=false;            	// if(!started){            	// 	started=true;            		$.ajax({            			async : false,            		 url: baseurl + 'index.php/register/check/',                            method: 'POST',                            dataType: 'json',                            data: {                            	                                email: $("input#email").val(),                                username: $("input#username").val(),                                 'jithu_csrf_token':  $.cookie('jithu_csrf_cookie')                            },                            error: function() {                                alert("An error occoured!");                            },                            success: function(response) {                                var status = response.email_status;                                //alert(status);                                if(status==false){                                	                                	errors=errors+1;                                	$('#email').closest('.input-group').addClass('validate-has-error');                                	$('#email').closest('.input-group').append('<label id="email-error" class="error" for="email">Email already used.</label>');                                	                                	                                }                                var status = response.username_status;                                //alert(status);                                if(status==false){                                	                                	errors=errors+1;                                	$('#username').closest('.input-group').addClass('validate-has-error');                                	$('#username').closest('.input-group').append('<label id="username-error" class="error" for="username">Username already used.</label>');                                	                                	                                }                                //finished=true;                            }            	});				// }				// }while(!finished);				//alert(errors);            }else  if (next_step=='step-3') {            	            	            if(document.getElementById('branch').selectedIndex==0){	            	errors=1;	            	//alert('Select branch value');	            	$('#branch').closest('.input-group').addClass('validate-has-error');	            }else{	            	$('#branch').closest('.input-group').removeClass('validate-has-error');	            }	             if(document.getElementById('lateral').selectedIndex==0){	            	errors=1;	            	//alert('Select admission type');	            	$('#lateral').closest('.input-group').addClass('validate-has-error');	            }	            else{	            	$('#lateral').closest('.input-group').removeClass('validate-has-error');	            }            }else{            	alert(9);            }            if(errors==0){            //console.log(next_step );            errors = validator.numberOfInvalids();            //console.log(validator);        	}            if (errors) {                validator.focusInvalid();            } else {                var $next_step = neonRegister.$steps_list.filter('#' + next_step),                    $other_steps = neonRegister.$steps_list.not($next_step),                    current_step_height = $current_step.data('height'),                    next_step_height = $next_step.data('height');                TweenMax.set(neonRegister.$steps, {                    css: {                        height: current_step_height                    }                });                TweenMax.to(neonRegister.$steps, 0.6, {                    css: {                        height: next_step_height                    }                });                TweenMax.to($current_step, .3, {                    css: {                        autoAlpha: 0                    },                    onComplete: function() {                        $current_step.attr('style', '').removeClass('current');                        var $form_elements = $next_step.find('.form-group');                        TweenMax.set($form_elements, {                            css: {                                autoAlpha: 0                            }                        });                        $next_step.addClass('current');                        $form_elements.each(function(i, el) {                            var $form_element = $(el);                            TweenMax.to($form_element, .2, {                                css: {                                    autoAlpha: 1                                },                                delay: i * .09                            });                        });                        setTimeout(function() {                            $form_elements.add($next_step).add($next_step).attr('style', '');                            $form_elements.first().find('input').focus();                        }, 1000 * (.5 + ($form_elements.length - 1) * .09));                    }                });            }        });        neonRegister.$steps_list.each(function(i, el) {            var $this = $(el),                is_current = $this.hasClass('current'),                margin = 20;            if (is_current) {                $this.data('height', $this.outerHeight() + margin);            } else {                $this.addClass('current').data('height', $this.outerHeight() + margin).removeClass('current');            }        });        neonRegister.$body = $(".login-page");        neonRegister.$login_progressbar_indicator = $(".login-progressbar-indicator h3");        neonRegister.$login_progressbar = neonRegister.$body.find(".login-progressbar div");        neonRegister.$login_progressbar_indicator.html('0%');        if (neonRegister.$body.hasClass('login-form-fall')) {            var focus_set = false;            setTimeout(function() {                neonRegister.$body.addClass('login-form-fall-init')                setTimeout(function() {                    if (!focus_set) {                        neonRegister.$container.find('input:first').focus();                        focus_set = true;                    }                }, 550);            }, 0);        } else {            neonRegister.$container.find('input:first').focus();        }        $.extend(neonRegister, {            setPercentage: function(pct, callback) {                pct = parseInt(pct / 100 * 100, 10) + '%';                neonRegister.$login_progressbar_indicator.html(pct);                neonRegister.$login_progressbar.width(pct);                var o = {                    pct: parseInt(neonRegister.$login_progressbar.width() / neonRegister.$login_progressbar.parent().width() * 100, 10)                };                TweenMax.to(o, .7, {                    pct: parseInt(pct, 10),                    roundProps: ["pct"],                    ease: Sine.easeOut,                    onUpdate: function() {                        neonRegister.$login_progressbar_indicator.html(o.pct + '%');                    },                    onComplete: callback                });            }        });    });})(jQuery, window);