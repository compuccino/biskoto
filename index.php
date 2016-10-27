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
    
    .found > summary {
      background: red;
    }
    .found > summary:after {
      content: '!';
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
<script>
  
  var dataElements = document.querySelectorAll('.biskoto-search');
  
  var searchElement = document.createElement('input');
  
  //TODO: this should work if the value changed, eg. on paste, too
  searchElement.onkeyup = function() {
    var searchString = this.value;

    //TODO: so far, only 1 search will work per page
    //TODO: find a good binding strategie, eg. via `rel=` or by initing the search on injection
    var dataElement = dataElements[0];
    
    //TODO: do a regex against the tree
    //TODO: save position in tree via imploded arrays: ['1,2,3','0,0,2,0','1,2']
    //TODO: iterate over the findings by adding a „found“ class to the corresponding detail branches
    var findString = function(element,childSelector){
      //search only 1st level elements
      //TODO: `:scope` support isn't robust, one should run a filter on `.children`
      var searchElements = element.querySelectorAll(':scope > dl > *, :scope > summary');
      
      //TODO: remove forEach w/ something you can break + buffer, like a while loop
      Array.prototype.forEach.call ( searchElements, function (searchElement, index) {
        
        if (searchElement.textContent.includes(searchString)) {
          //TODO: differ between `found` + `found-trail`, meaning elements above the finding
          element.classList.add('found');
          //break; //1 occurence would be sufficient //TODO: doesn't work?
        }
      });
      
      //TODO: check on childSelector, call itself again
      
    }
    
    //kill last search indicators
    //TODO: replace `document` w/ tree wrapper currently kills all elements w/ found due to a missing wrapper
    Array.prototype.forEach.call ( document.querySelectorAll('.found'), function (oldFinding, index) {
      oldFinding.classList.remove('found');
    });
    
    if (searchString.length > 0) {
      findString(dataElement,'details:not(details > details)');
    }
    

  }
  
  if (dataElements.length > 0) {
    Array.prototype.forEach.call ( dataElements, function (dataElement, index) {
      
      //prepend search block
      dataElement.parentNode.insertBefore(searchElement,dataElement);
    });

  }
   
</script>

</body>
</html>