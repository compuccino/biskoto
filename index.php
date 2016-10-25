<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body {
      font-family: sans-serif;
      line-height: 1.4em;
    }
    
    summary {
      outline: none;
      cursor: pointer;
      background: rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <h1>Baum</h1>
  
  Markup demos w/ <code>&lt;details&gt;</code>

  <?php
  

include 'markup.inc';
  
    //TODO: better testcase dummies
    include('dummy-var.php'); //loads dummy object $var
    
    //include('do_dump.php'); //loads original `do_dump()` function
    include('cheapass_krumo.php'); //loads modified krumo function
  
cheapass_krumo($var);
  
  ?>
  
</body>
</html>