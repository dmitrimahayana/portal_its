/*global jQuery */
/*jshint multistr:true browser:true */
/*!
* FitVids 1.0
*
* Copyright 2011, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
* Date: Thu Sept 01 18:00:00 2011 -0500
*/

(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null
    };

    if(!document.getElementById('fit-vids-style')) {

      var div = document.createElement('div'),
          ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0],
          cssStyles = '&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';

      div.className = 'fit-vids-style';
      div.id = 'fit-vids-style';
      div.style.display = 'none';
      div.innerHTML = cssStyles;

      ref.parentNode.insertBefore(div,ref);

    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch

      $allVideos.each(function(){
        var $this = $(this);
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
})( jQuery );

// GET YOUTUBE POPUP
function openYouTube(id){ 
      //YouTube Player Parameters 
      var width = 640; 
      var height = 505; 
      var FullScreen = "yes"; 
      var AutoPlay = "yes"; 
      var HighDef = "yes"; 
      
      //Calculate Page width and height 
      var pageWidth = window.innerWidth; 
      var pageHeight = window.innerHeight; 
      if (typeof pageWidth != "number"){ 
      if (document.compatMode == "CSS1Compat"){ 
            pageWidth = document.documentElement.clientWidth; 
            pageHeight = document.documentElement.clientHeight; 
      } else { 
            pageWidth = document.body.clientWidth; 
            pageHeight = document.body.clientHeight; 
            } 
      } 
      // Make Background visible... 
      var divbg = document.getElementById('bg'); 
      divbg.style.visibility = "visible"; 
      
      //Create dynamic Div container for YouTube Popup Div 
      var divobj = document.createElement('div'); 
      divobj.setAttribute('id',id); // Set id to YouTube id 
      divobj.className = "popup"; 
      divobj.style.visibility = "visible"; 
      var divWidth = width + 4; 
      var divHeight = height + 20; 
      divobj.style.width = divWidth + "px"; 
      divobj.style.height = divHeight + "px"; 
      var divLeft = (pageWidth - divWidth) / 2; 
      var divTop = (pageHeight - divHeight) / 2 - 10; 
      //Set Left and top coordinates for the div tag 
      divobj.style.left = divLeft + "px"; 
      divobj.style.top = divTop + "px"; 
      
      //Create dynamic Close Button Div 
      var closebutton = document.createElement('div'); 
      closebutton.style.visibility = "visible"; 
      closebutton.innerHTML = "<span onclick=\"closeYouTube('" + id +"')\" class=\"close_button\">Close</span>"; 
      //Add Close Button Div to YouTube Popup Div container 
      divobj.appendChild(closebutton); 

      //Create dynamic YouTube Div 
      var ytobj = document.createElement('div'); 
      ytobj.setAttribute('id', "yt" + id); 
      ytobj.className = "ytcontainer"; 
      ytobj.style.width = width + "px"; 
      ytobj.style.height = height + "px"; 
      if (FullScreen == "yes") FullScreen="&fs=1"; else FullScreen="&fs=0"; 
      if (AutoPlay == "yes") AutoPlay="&autoplay=1"; else AutoPlay="&autoplay=0"; 
      if (HighDef == "yes") HighDef="&hd=1"; else HighDef="&hd=0"; 
      var URL = "http://www.youtube.com/v/" + id + "&hl=en&rel=0&showsearch=0" + FullScreen + AutoPlay + HighDef; 
      var YouTube = "<object width=\"" + width + "\" height=\"" + height + "\">"; 
      YouTube += "<param name=\"movie\" value=\"" + URL + "\"></param>"; 
      YouTube += "<param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>"; 
      YouTube += "<embed src=\"" + URL + "\" type=\"application/x-shockwave-flash\" "; 
      YouTube += "allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"" + width + "\" height=\"" + height + "\"></embed></object>"; 
      ytobj.innerHTML = YouTube; 
      //Add YouTube Div to YouTube Popup Div container 
      divobj.appendChild(ytobj); 
      
      //Add YouTube Popup Div container to HTML BODY 
      document.body.appendChild(divobj); 
} 

function closeYouTube(id){ 
      var divbg = document.getElementById('bg'); 
      divbg.style.visibility = "hidden"; 
      var divobj = document.getElementById(id); 
      var ytobj = document.getElementById("yt" + id); 
      divobj.removeChild(ytobj); //remove YouTube Div 
      document.body.removeChild(divobj); // remove Popup Div 
} 

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
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


// MAIN

$(function()
{
  $(".popup").fitVids();

  $('#dd-1').ddslick();
  $('#dd-2').ddslick({
    width: 180,
    height: null,
    background: "transparent",
  });
  $('#dd-0').ddslick({
    width: 180,
    height: null,
    background: "transparent",
  });
  $('#dd-3').ddslick({
    width: 160,
    height: null,
    background: "transparent",
  });

  $('#ticker').vTicker(
    'init', {
      speed: 400, 
      showItems: 1,
      padding:0,
    }
  );
  $('#pause').click(function() { 
    $this = $(this);
    if($this.text() == 'Pause') {
      $('#ticker').vTicker('pause', true);
      $this.text('Unpause');
      $this.toggleClass('control-paused');
    }
    else {
      $('#ticker').vTicker('pause', false);
      $this.text('Pause');
      $this.toggleClass('control-paused');
    }
  });
  $('#ticker-prev').click(function() { 
    $('#ticker').vTicker('prev', {animate:true});
  });
  $('#ticker-next').click(function() { 
    $('#ticker').vTicker('next', {animate:true});
  });

  var navigation = responsiveNav("#nav", { 
    transition: 100, // kecepatan efek transisi menu muncul/sembunyi sempurna
    label: "Menu",
    insert: "before",
    jsClass: "navigation-js"
  });
});

$(document).ready(function(){  
  $("#sitemap_menu").click(function(e){
    e.preventDefault();
    $("#sitemap").slideToggle(400);
    $('html,body').animate({scrollTop: $(this).offset().top}, 400);
    return false;   
  });

  $(function(){
        $('.scroll-pane,.per3').css('height','200px'); // harus sebelum fungsi jScrollpane
        $('.scroll-pane-media').css('height','440px'); // harus sebelum fungsi jScrollpane
        $('.scroll-pane-media-tv,.scroll-pane-media-slide').css('height','315px'); // harus sebelum fungsi jScrollpane
        $('.scroll-pane').jScrollPane({
                verticalDragMinHeight: 21,
                verticalDragMaxHeight: 21
            }
        );
    });

});

$(window).resize(function() {
    $(function(){
        $('.scroll-pane').jScrollPane({  // restart fungsi scroll page onResize biar ngitung kembali lebar wrapnya
                verticalDragMinHeight: 21,
                verticalDragMaxHeight: 21
            }
        );
    });
});