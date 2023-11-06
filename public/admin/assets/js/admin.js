$(function() {

    $('#side-menu').metisMenu();
	
	$('.dp').datepicker({ dateFormat: 'yy-mm-dd' });
	
	$('.dp_future').datepicker({ dateFormat: 'yy-mm-dd', minDate: 0 });
	
	// Bootstrap Multiple Select
	$('.select-max-height').multiselect({
		maxHeight: 300,
		buttonWidth: '100%',
		buttonClass: 'btn btn-default',
		includeSelectAllOption: true,
		enableFiltering: true,
	});
	
	
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
	
	// tinymce.init({
		// selector: "textarea.tinymce",
		// plugins: [
			// "advlist autolink lists link image charmap print preview anchor",
			// "searchreplace visualblocks code fullscreen",
			// "insertdatetime media table contextmenu paste"
		// ],
		// toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	// });

})