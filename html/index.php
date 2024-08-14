<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
      body {
         margin: 0;
      }

      .navbar {
         overflow: hidden;
         background-color: #99c;
         position: fixed;
         top: 0;
         width: 100%;
      }

      .navbar a {
         float: left;
         display: block;
         color: #f2f2f2;
         background-color: inherit;
         text-align: center;
         padding: 14px 16px;
         text-decoration: none;
         font-size: 17px;
      }

      .navbar a:hover {
         background: #ddd;
         color: black;
      }

      .main {
         padding: 16px;
         margin-top: 30px;
         height: 1500px;
      }
   </style>
</head>

<body>

   <div class="navbar">
      <a href="http://localhost:8000/phppgadmin/" target="_blank">phppgadmin</a>
      <a href="http://localhost:8000/Blog/public/index.php" target="_blank">Blog</a>
      <a href="http://localhost:8000/Pattern/Singleton/index.php" target="_blank">Singleton</a>
   </div>

   <div class="main">
      <?php phpinfo(); ?>
   </div>

</body>

</html>