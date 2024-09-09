$(document).ready(function(){

	$('.miswitch a').click(function(){
		$('.swicht-btn').toggleClass('on');

		if($('.swicht-btn').hasClass('on')){
			$('.pricing-table-cont').addClass('rotando-tabla');
		} else {
			$('.pricing-table-cont').removeClass('rotando-tabla');
		}
	});

});
