<!doctype php>
<?php
	session_start();
?>

<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Statistics</title>
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
    <script type="text/javascript" src="dropdown.js"></script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
    
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header> <a href="">
    <h4 class="logo"></h4>
    </a>
    <nav>
      <ul>
        
        <li></li>
        <li> </li>
      </ul>
    </nav>
  </header>
  <!-- Hero Section -->
  <section class="hero" id="hero">
      <h2 class="hero_header">Statistics </h2>
    <p class="tagline">Text: </p>
      <p class="tagline">Words passed 1st time: </p>
      <p class="tagline">Words passed 2nd time: </p>
      <p class="tagline">Words failed: </p>
      <p class="tagline">Difficulty: <span id="dif"></span></p>
     
      <script>
        var v1 = getParameterByName("diff");
        document.getElementById("dif").innerHTML = v1;
      </script>
      
      <p class="tagline">Total score: </p>
    <center>
	<a href="WebPage.html"><button type="button">Return to Start</button></a>
	</center>
  </section>
  <!-- About Section -->
  <section class="about" id="about">
<h2 class="hidden">About</h2>
   

  <!-- Parallax Section -->
  
  <!-- More Info Section -->
  <footer>
    
  </footer>
  <!-- Footer Section -->
  
  <!-- Copyrights Section -->

</div>
<!-- Main Container Ends -->
</body>
</html>
