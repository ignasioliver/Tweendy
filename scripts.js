$(document).ready(function() {
    $("#content").children().css({'border-radius':'100%','position':'absolute'});
    $("#content").children().mouseover(function() {
       $("#content").children().not(this).animate({opacity:0.3}, 'fast').css('z-index','-1');
       $(this).children().addClass("link2");
    });
    $("#content").children().mouseout(function() {
       $("#content").children().not(this).animate({opacity:1}, 'fast').css('z-index','0');
       $(this).children().removeClass("link2");
    });
    var wd = $(document).width();
    var hd = $(document).height();
    
    $.ajax({                                      
          type: 'post',
          url: 'toscripts.php',                                                        
          dataType: 'JSON',                     
          success: function(data) {
          	//$.each(data, function(data2))
          	   //console.log(data);

               for (var i = 0; i < data.length; i++) {
                   for (var j = 0; j < data[i].length; j++) {
                       var name = data[i][j]["name_country"].replace(/\s/gi, '').toLowerCase();
                       var image = data[i][j]["flag"].replace(/\\/gi, '');
                       var volume = parseInt(data[i][j]["trend_volume"], 10);
                       var trend = data[i][j]["trend_name"];
                       var hasht = data[i][j]["trend_name"].replace(/#/gi, '');
                       hasht = hasht.replace(/\s/gi, '%20');
                       var top = Math.round(100*Math.random());
                       var left = Math.round(100*Math.random());
                       var crate = ((100*volume)/2000000);
                       $('#' + name + j%5).css({'background-image':'url('+image+')',
                                          'background-size':'cover','background-position'
                                          :'center','width':crate+'px',
                                          'height':crate+'px'})
                                          .html("<a class='link' href='https://twitter.com/hashtag/"+hasht+"' target='_blank'>"+trend+"</a>");
    					$('#' + name + j%5).css({'top':top+'%','left':left+'%'});
    					/*if (j%5 === 0) $('#' + name + j%5).css({'top':top+'%','left':left+'%'});
    					else if (j%5 === 1) {
    					    $('#' + name + j%5).css({'top':(top-(crate/hd))+'%','left':(left-ran*(crate/wd))+'%'});
    					}
    					else if (j%5 === 2) {
    					    $('#' + name + j%5).css({'top':(top-ran*(crate/hd))+'%','left':(left+(rate/wd))+'%'});
    					}
    					else if (j%5 === 3) {
    					    $('#' + name + j%5).css({'top':(top+(rate/hd))+'%','left':left+'%'});
    					}
    					else {
    					    $('#' + name + j%5).css({'top':(top+(rate/hd))+'%','left':(left+(rate/wd))+'%'});
    					}*/
                   }
               }
          } 
    }); 
});

/*$(document).ready(function() {
    
    $.ajax({                                      
          type: 'post',
          url: 'toscripts.php',                                                        
          dataType: 'JSON',                     
          success: function(data) {     
              console.log(data);
          }     
    }); 
});*/