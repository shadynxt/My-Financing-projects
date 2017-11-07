
//mian_slider
$('.owl-carousel-1').owlCarousel({
  navigation : true, // показывать кнопки next и prev
 items:1,
  singleItem: true,
  loop:true,
  nav:true,
});
//
//offer_slider
$('.owl-carousel-2').owlCarousel({
navigation : true, // показывать кнопки next и prev
items:3,
singleItem: true,
loop:true,
nav:true,
dots:false,
responsive:{
     0:{
         items:1
     },
     600:{
         items:2
     },
     1010:{
         items:3
     }
 }

});
//

//search_section
$(".fa-search").click(function(){
  $(".search_form").addClass("search_form_");
  $(".nav_ul").addClass("nav_ul_");
  $(".main_hr").css("opacity","0");
  $(".fa-search").css("display","none");
  $(".fa-close").css("display","block");
  $(".Logo_img").addClass("lomg");
  $(".small_collaps").addClass("lomg");
});
//search_section
$(".fa-close").click(function(){
  $(".search_form").removeClass("search_form_");
  $(".nav_ul").removeClass("nav_ul_");
  $(".fa-search").css("display","block");
  $(".fa-close").css("display","none");
  $(".Logo_img").removeClass("lomg");
  $(".small_collaps").removeClass("lomg");
});

$(".cls").click(function(){
    $(".nativ_modal").css("display","none");

});


//slider_controls
$(".owl-next").html("<i class='fa fa-angle-right' aria-hidden='true' ></i>"); //.html(): Clean HTML inside and append
$(".owl-prev").html("<i class='fa fa-angle-left' aria-hidden='true' ></i>"); //.html(): Clean HTML inside and append

//side_Nav
$(".button-collapse").sideNav({
     menuWidth: 300, // Default is 300
     edge: 'right', // Choose the horizontal origin
     closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
     draggable: true // Choose whether you can drag to open on touch screens
});

//data-fancybox
$("[data-fancybox]").fancybox({
  // Options will go here
});


//animation_plugin init
AOS.init({
  disable: 'mobile'
  });

//.profil_menu
  $(".profil_").click(function(){
    $(".hom").addClass("hom_");
    $(".profil_").css("display","none");
    $(".profil__").css("display","block");
  });

  $(".profil__").click(function(){
    $(".hom").removeClass("hom_");
    $(".profil__").css("display","none");
    $(".profil_").css("display","block");
  });

  $('input#input_text, textarea.textarea_1').characterCounter();
 //  $('.datepicker').pickadate({
 //   selectMonths: true, // Creates a dropdown to control month
 //   selectYears: 15 // Creates a dropdown of 15 years to control year
 // });
 //

 /*.file-drop-zone script */

 $(".input-711").fileinput({
   uploadUrl: "http://localhost/file-upload-single/1", // server upload action
   uploadAsync: true,
   theme: "fa",
   showBrowse: false,
   browseOnZoneClick: true,
    allowedFileTypes: ["image"],
   defaultPreviewContent:"<div class='defaultPreview_'>ضع صورتك هنا ...  او قم بالنقر هنا <div>"
 });
 $(".input-712").fileinput({
   uploadUrl: "http://localhost/file-upload-single/1", // server upload action
   uploadAsync: true,
   theme: "fa",
   showBrowse: false,
   browseOnZoneClick: true,
    allowedFileTypes: ["image"],
   defaultPreviewContent:"<div class='defaultPreview_'>ضع صورتك هنا ...  او قم بالنقر هنا <div>"

 });
 $(".input-714").fileinput({
   uploadUrl: "http://localhost/file-upload-single/1", // server upload action
   uploadAsync: true,
   theme: "fa",
   showBrowse: false,
   browseOnZoneClick: true,
    allowedFileTypes: ["image"],
   defaultPreviewContent:"<div class='defaultPreview_'><i class='fa fa-camera' aria-hidden='true'></i><div>"

 });
 $(".input-713").fileinput({
   showCaption: false,
   maxFileCount: 1,
    allowedFileTypes: ["video"]
     });

 $(".vdio_ .btn-file").removeClass("btn");
 $(".vdio_ .btn-file").removeClass("btn btn-primary");
 $(".kv-file-remove").removeClass("btn , btn-xs , btn-default");
 $(".vdio_ .btn-file span").html("اضف فديو");
 $(".vdio_ .file-preview").addClass("col , s12");
