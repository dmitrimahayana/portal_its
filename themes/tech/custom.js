


function loadScript(url, callback)
{
    // adding the script tag to the head as suggested before
   var head = document.getElementsByTagName('head')[0];
   var script = document.createElement('script');
   script.type = 'text/javascript';
   script.src = url;

   // then bind the event to the callback function 
   // there are several events for cross browser compatibility
   script.onreadystatechange = callback;
   script.onload = callback;

   // fire the loading
   head.appendChild(script);
}

loadScript('/themes/tech/jquery.scrollTo-1.4.2-min.js', null);
loadScript('/themes/tech/jquery.parallax-1.1.3.js', paralaxit);

function paralaxit(){
	$(function(){
		$('body').parallax("50%", 0.3);
	});
}