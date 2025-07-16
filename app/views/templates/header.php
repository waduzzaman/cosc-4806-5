  <?php
  if (!isset($_SESSION['auth'])) {
      header('Location: /login');
      exit;
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <!-- ✅ Add Tailwind CDN -->
      <script src="https://cdn.tailwindcss.com"></script>

      <!-- daisyUI -->
      <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

      <link rel="icon" href="/favicon.png">
      <title>COSC 4806</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="mobile-web-app-capable" content="yes">

    </head>
    <body class="bg-gray-100 text-gray-900">

    
  </head>
  <body class="bg-gray-100 text-gray-900">

  <!-- ✅ Tailwind + DaisyUI Navbar -->
  <div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-10 mt-3 w-52 p-2 shadow">
          <li><a href="/home">Home</a></li>
          <li><a href="/home/about">About Me</a></li>
           <li><a href="/reminders">Reminders</a></li>    
          <li><a href="/home/portfolio">Portfolio</a></li>
          
        </ul>
      </div>
      <a href="/home" class="btn btn-ghost text-xl">COSC 4806</a>
    </div>

    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        <li><a href="/home">Home</a></li>
        <li><a href="/home/about">About Me</a></li>
        <li><a href="/reminders">Reminders</a></li>        
        <li><a href="/home/portfolio">Portfolio</a></li>
      </ul>
    </div>

    <div class="navbar-end">
      <a href="/contact" class="btn">Contact</a>
    </div>
  </div>
