$(function() {
	"use strict";
	
	
	    $(document).ready(function() {
			$('#example').DataTable();
			$('#example1').DataTable();
			$('#example3').DataTable();
			$('#example4').DataTable();
			$('#example5').DataTable();
		  } );

		 
		  
		  
		   $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: true,
				buttons: [ 'excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );

		$(document).ready(function() {
			var table = $('#example7').DataTable( {
				lengthChange: true,
				buttons: [ 'excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example7_wrapper .col-md-6:eq(0)' );
		} );

		$(document).ready(function() {
			var table = $('#example8').DataTable( {
				lengthChange: true,
				buttons: [ 'excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example8_wrapper .col-md-6:eq(0)' );
		} );

		$(document).ready(function() {
			var table = $('#example9').DataTable( {
				lengthChange: true,
				buttons: [ 'excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example9_wrapper .col-md-6:eq(0)' );
		} );

		$(document).ready(function() {
			var table = $('#example10').DataTable( {
				lengthChange: true,
				buttons: [ 'excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example10_wrapper .col-md-6:eq(0)' );
		} );
	
	$(document).ready(function() {
			var table = $('#example11').DataTable( {
				lengthChange: true,
				buttons: [ 'excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example11_wrapper .col-md-6:eq(0)' );
		} );
	
	});