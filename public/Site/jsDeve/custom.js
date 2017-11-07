/* 
 To controll every thig in the app
 */

$( document ).ready(function() {
 $('#good').hide();
// To go to spacial part to index page  that is About Us 
$(".about").click(function () {
	var href = $('#good').attr('href');
      // window.location.href = href+'#about_us';
       window.location.href = href+'#about_us';

});
// To go to spacial part to index page  that is Goals
$(".goal").click(function () {
	var href = $('#good').attr('href');
      window.location.href = href+'#goals';
});
// To go to spacial part to index page  that is Recent Projects
$(".recent").click(function () {
	var href = $('#good').attr('href');
      window.location.href = href+'#recent';
});
// To go to spacial part to index page  that is most supportive projects
$(".most_supportive").click(function () {
	var href = $('#good').attr('href');
      window.location.href = href+'#most_supportive';
});

// choose the category
$('.category_1').click(function(e){
  e.preventDefault();

  var cat_id = $(this).data('cat-id');

   $("#catt option").filter(function(){

         return $(this).val() == cat_id;

   }).prop('selected',true);

   $('select').niceSelect('update');
});

// load the page  in chat Page
// $('.cat3').click(function(e){
//   e.preventDefault();

//   var user_id = $(this).data('user-id');
//    $(this).attr('action', user_id);
   // $("#catt option").filter(function(){

   //       return $(this).val() == cat_id;

   // }).prop('selected',true);

   // $('select').niceSelect('update');
// })



});


