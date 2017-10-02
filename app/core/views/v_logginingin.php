<script>
   $.colorbox.resize();
   $.colorbox.close();
   var page = window.location.href;
   page = page.substring(0, page.lastIndexOf('?'));
   window.location = page;
</script>

<div class="col-sm-2 col-sm-offset-5 centered text-center loading">
   <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
   <span class="sr-only">Loading...</span>
</div>