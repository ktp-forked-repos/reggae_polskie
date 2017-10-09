$(document).ready(function(){
   window.setTimeout(function () {
      if ($('.advertisement').height() === 50 || $('.advertisement').filter(':visible') === 50) {
         $('.no-ads-info').show();
      }
   }, 3000);
})();