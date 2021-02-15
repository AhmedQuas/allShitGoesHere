var owl = jQuery.noConflict();
owl(document).ready(function(){
  owl('.owl-carousel').owlCarousel({
    loop:true,
    nav:false,
    items:1,
})
});