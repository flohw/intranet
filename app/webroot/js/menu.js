jQuery(function($){
         $(".secondary-nav").mouseover(function(){
            $('.menu-dropdown').stop().slideDown();
                              
         });
         $('.menu-dropdown').mouseout(function(){
             $(this).stop().slideUp();
         });
         
         $("table#sortTableExample").tablesorter({ sortList: [[1,0]] });
         
      });