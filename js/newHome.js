var timeoutHandle = window.setInterval(next(),7000);
function next()
{
		$('#next').trigger('click');
}