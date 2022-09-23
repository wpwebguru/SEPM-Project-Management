jQuery(function($) {
    // Tab codes
    if(window.location.hash) {
        window.location.hash
        document.querySelector('[href="' + window.location.hash.replace('##',"#") +  '"]').click();
        //window.location.hash = '';
    }
    
    $(".reload li").click( e => {
		e.preventDefault();
        console.log(e.target);
        window.location.hash = e.target.href.split('#')[1];
		location.reload();
		//window.location.href = e.target.href.split('#')[1];
		
    });
    
  
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

$(document).on('click', '.link-summary', function(e){
	e.preventDefault();
	let id = $(this).attr('id').split('-')[2];
	let parent = $('#sepm_sub_tab');
	let trigger = parent.find("li a[href*='#" + id + "']" );
	trigger.tab('show');
});









   
    
});