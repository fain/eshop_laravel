$(function(){
 $('.btn-circle').on('click',function(){
   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
   $(this).addClass('btn-info').removeClass('btn-default').blur();
 });

 $('.next-step, .prev-step').on('click', function (e){
   var $activeTab = $('.col-md-2.active');

   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

   if ( $(e.target).hasClass('next-step') )
   {
      var nextTab = $activeTab.next('.col-md-2').attr('id');
      $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ nextTab +'"]').tab('show');
   }
   else
   {
      var prevTab = $activeTab.prev('.col-md-2').attr('id');
      $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ prevTab +'"]').tab('show');
   }
 });
});