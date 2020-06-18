var opcban=[0,0,0,0,0,0,0];

/*var video=0;
function menuhome_video(){
      
      if (video ==0) { 
            $('#divmenuf-1').animate({  bottom: '180'},330);
            video=1;
      }else{
           $('#divmenuf-1').animate({  bottom: '0'},330);
           video=0; 
      }
      
}*/
/*

function menuinferior(opc){
      if (opc==5) {
        opcban[6]=1; 
        menucontacto(); 
      }
      
    if (opcban[opc-1]==0) {
      posicion=getPosition(opc);
      console.log(posicion);
      
      $('#panelf-'+opc).css({   left: posicion.x, position: 'fixed', bottom:-180});
      $('#imagenf-'+opc).css({ position: 'relative'});
      $('#imagenf-'+opc).animate({  bottom: '180'},330);      
      $('#panelf-'+opc).css({  position: 'fixed', height: '185px', width:document.getElementById('imagenf-'+opc).clientWidth,   left: posicion.x});
      $('#panelf-'+opc).animate({ bottom: -1, position:'absolute' },310);
      opcban[opc-1]=1;
    }else{
      posicion=getPosition(opc);
      console.log(posicion);
 
      $('#imagenf-'+opc).animate({  bottom: 0},280);       
      $('#panelf-'+opc).animate({ bottom: -180},300);
      
 
 }
}
*/
function getPosition(opc) {
    element=document.getElementById('imagenf-'+opc); 
    var xPosition = 0;
    var yPosition = 0;  
    while(element) {
        xPosition += (element.offsetLeft - element.scrollLeft + element.clientLeft);
        yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
        element = element.offsetParent;
    }
    return { x: xPosition, y: yPosition };
}
var banmenuaspirante=1;
function menuaspirante(opcm){
    if(opcm==1) {
      $('#menuaspirante').css({ position: 'fixed', 'display':'block', width: document.getElementById('menu_derecha').clientWidth,   padding:0, margin:0});
      $('#menuaspirante').animate({ top: 65,   opacity: 1},200);
      
    }
    if (opcm==0 && banmenuaspirante==0) {
      $('#menuaspirante').css({'display':'none'});
      $('#menuaspirante').animate({ top: -65,   opacity: 0},200);
  }
}
function menucontacto(){
  if (opcban[6]==0) {
    $('#menucontactox').css({'display':'block'});
    $('#imgmenucontacto').animate({ right: 240},200);
    $('#menucontactox').animate({ right:1},200);
      
    opcban[6]=1; 
  }else{
    $('#imgmenucontacto').animate({ right: 0},200);
    $('#menucontactox').css({'display':'none'},200);
    opcban[6]=0;    
  }
}
var pretipo=0;
function pre_menucontacto(){
   if (pretipo==0) {
    $('#menu_paso0').hide();
    $('#menu_paso1').show();
    pretipo=1;
  }else{
    $('#menu_paso1').hide();
    $('#menu_paso0').show(); 
    pretipo=0;    
  }
}

 
if($('#panelf-1').length > 0) {
  /*    $('#imagenf-1').css({  height: document.getElementById('conimagen-1').clientHeight, width:document.getElementById('conimagen-1').clientWidth});
  /*$('#panelf-1').css({  position: 'fixed', height: '185px', width:document.getElementById('imagenf-1').clientWidth,   left: getPosition(1).x});
  $('#panelf-2').css({  position: 'fixed', height: '185px', width:document.getElementById('imagenf-2').clientWidth,   left: getPosition(2).x});
  $('#panelf-3').css({  position: 'fixed', height: '185px', width:document.getElementById('imagenf-3').clientWidth,   left: getPosition(3).x});
  $('#panelf-4').css({  position: 'fixed', height: '185px', width:document.getElementById('imagenf-4').clientWidth,   left: getPosition(4).x});
  $('#panelf-5').css({  position: 'fixed', height: '185px', width:document.getElementById('imagenf-5').clientWidth,   left: getPosition(5).x});*/
} 
 
 
 
 

WebFontConfig = {
  google: { families: [ 'Lato:400,700,300:latin' ] }
};
 
(function($){
  $(function(){

    var window_width = $(window).width();
    function is_touch_device() {
      try {     document.createEvent("TouchEvent");   return true;
      } catch (e) {    return false; }
    }
    if (is_touch_device()) {    $('#nav-mobile').css({ overflow: 'auto'});   }
    // Plugin initialization
   
    //$('footer').pushpin({ bottom: 0 });
    $(".button-collapse").sideNav();
    $('.collapsible').collapsible({ accordion : false    });  
    $('select').material_select();
    $('#menucontacto').css({ top: 258 });
    
  $( "#menuaspirante" ).mouseover(function() {  menuaspirante(1);    console.log("over");  banmenuaspirante=1;  }).mouseout(function() { banmenuaspirante=0;  setTimeout("menuaspirante(0)",1000); console.log("out"); });
    
    
    
    if($('.fullscreen2').length > 0) { 
        var $doc = $(document);
        var centerY = $doc.height() / 2;
        $('.fullscreen2').slider({full_width: true, height:centerY+(centerY/3)-130,indicators:false});
        $('#div_cuerpo_contenido').css({'min-height':(centerY/2)+(centerY/3)-70});
        $('#div_cuerpo_twitter').css({'height':$('#div_cuerpo_contenido').height()});
        $('#div_twitter').css({'width':$('#div_cuerpo_twitter').width()-($('#imgmenucontacto').width()+2)});        
        //$('#footer').css({'height':(centerY/2)+(centerY/3)-4}); 
    }
     if($('.fullscreen').length > 0) {
      $('.slider').slider({full_width: true});
    }
     
    $('.dropdown-menu').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    });


$(".menuabajo").hover(function(){
    $(this).animate({ bottom: "180" });
}, function() {
    $(this).animate({ bottom: "0" });
});


     
    
  }); // end of document ready
  
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
  
 $('.menu-derecho').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: 400, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'right', // Displays dropdown with edge aligned to the left of button
      
    }
  );     
})(jQuery);

// Initialize Share-Buttons
$.shareButtons({
  effect  : 'slide-on-scroll',
  buttons : {
    'facebook':   { class: 'facebook', use: true, link: 'http://www.facebook.com/universidadanahuacmexiconorte', extras: 'target="_blank"' },
    'twitter':   {  class: 'twitter',  use: true, link: 'https://twitter.com/redanahuac' , extras: 'target="_blank"'},
    'youtube':     { class: 'youtube', use: true, link: 'https://www.youtube.com/user/RedAnahuac', extras: 'target="_blank"' },
    'flickr':     { class: 'flickr', use: true, link: 'http://www.flickr.com/photos/universidadanahuac/', extras: 'target="_blank"' }
  }
});
 
 
   