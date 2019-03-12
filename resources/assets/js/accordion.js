
/*
$('.collapse').collapse({
  alert("aa");
});
*/

$( document ).ready(function() {
    //if ($(".accordion")[0]){
        $(".accordion").each(function() {
            //alert("aa"); // or this.val
            
            // Remove BR in between two accordions if there is ONE <br>
                if(jQuery(this).next().is('br')) {
                    if(jQuery(this).nextAll("*:lt(2)").is('.accordion')) {
                        //console.log("remove");
                        jQuery(this).next().remove();
                    }
                }
                
            // If there are TWO <br>
                if(jQuery(this).next().is('br')) {
                    if(jQuery(this).nextAll("*:lt(2)").is('br')) {
                        if(jQuery(this).nextAll("*:lt(3)").is('.accordion')) {
                            //console.log("remove");
                            jQuery(this).next().remove();
                            jQuery(this).next().remove();
                        }
                    }
                }

        // If this is the last element of the group add the border
            if(!jQuery(this).next().is('.accordion')) {
                jQuery(this).css({ 'border-bottom': ("1px solid #c5c5c5") });
            }

        // If the content of an accordion start with <br> remove it
            if(jQuery(this).children('.accordion-body').children('.accordion-body-content').children(':first-child').is('br')) {
                jQuery(this).children('.accordion-body').children('.accordion-body-content').children('br:first-child').remove();
            }
        
        
        
        });
        
    //}
});

/*
$('.collapse').on('hidden.bs.collapse', function () {
  alert("bb");
});

$('.collapse').on('shown.bs.collapse', function () {
  alert("cc");
});
*/
