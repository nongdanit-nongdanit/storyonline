<!DOCTYPE html>
<html lang="en">

<?=$this->element('truyentranh/head');?>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1667964226782386";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-65622213-2', 'auto');
      ga('send', 'pageview');
      ga('require', 'displayfeatures');
      ga('require', 'linkid', 'linkid.j'); 
    
    </script>
    <?=$this->element('truyentranh/header');?>

    <?php //echo $this->element('truyentranh/slider');?>
    <div id="resultsDiv">
        <?=$this->fetch('content'); ?>
    </div>
    
    
    <?=$this->element('truyentranh/footer');?>
</body>
</html>