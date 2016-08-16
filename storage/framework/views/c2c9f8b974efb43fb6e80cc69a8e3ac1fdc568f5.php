<!DOCTYPE html>
<html>
<head>
<meta name="_token" id="_token" value="<?php echo csrf_token(); ?>">
  <title></title>
</head>

 <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
  <body>

  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
        
    <?php echo $__env->yieldContent('content'); ?>
  </body>


<script type="text/javascript" src="<?php echo e(asset('js/all.js')); ?>"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script> -->

 <!-- Compiled and minified CSS -->

  <!-- Compiled and minified JavaScript -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script> -->

  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script> -->

<?php echo $__env->yieldPushContent('script'); ?>
</html>