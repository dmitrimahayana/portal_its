Modernizr.load([
{
  load: '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
  complete: function () {
    if ( !window.jQuery ) {
          Modernizr.load('js/jquery-1.10.2.min.js');
    }
  }
},
{
  // This will wait for the fallback to load and
  // execute if it needs to.
  load: 'js/main.js'
}
]);

WebFontConfig = {
   google: { families: [ 'Source+Sans+Pro:200,400,700,200italic,400italic,700italic:latin' ] }
};

(function() {
   var wf = document.createElement('script');
   wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
   wf.type = 'text/javascript';
   wf.async = 'true';
   var s = document.getElementsByTagName('script')[0];
   s.parentNode.insertBefore(wf, s);
})(); 