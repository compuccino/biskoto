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
  
  <details>
    <summary>Key (type)</summary>
    Content
    <details>
      <summary>Key</summary>
      Content
    </details>
  </details>
  
  <details>
    <summary>Key (type)</summary>
    <ul>
      <li>
        Content
      </li>
      <li>
        <details>
          <summary>Key</summary>
          Content
        </details>
      </li>
    </ul>
  </details>
  
<details>
  <summary>
    array(35)
  </summary>
  
  <dl>
    <dt>["vid"]</dt>
    <dd>string(4) "4381"</dd>
    
    <dt>["uid"]</dt>
    <dd>string(2) "25"</dd>
    
    <dt>["title"]</dt>
    <dd>string(45) "Lorem Ipsum"</dd>
    
    <dt>["body"]</dt>
    <dd>
      <details>
        <summary>
          array(1)
        </summary>
        <dl>
          <dt>
            ["und"]=>
          </dt>
          <dd>
            <details>
              <summary>
                array(1)
              </summary>
              <dl>
                <dt>
                  [0]
                </dt>
                <dd>
                  <details>
                    <summary>
                      array(5)
                    </summary>
                    <dl>
                      <dt>
                        ["value"]
                      </dt>
                      <dd>
                        string(961) "
                        Long Multiline string
                        
                        Lorem Ipsum 
                      "</dd>
                      <dt>
                        ["summary"]
                      </dt>
                      <dd>
                        string(0) ""
                      </dd>
                    </dl>
                  </details>
                </dd>
              </dl>
            </details>
          </dd>
        </dl>
      </details>
    </dd>
    
    <dt>
      ["field_images"]
    </dt>
    <dd>
      array(0)
    </dd>
    <dt>
      ["cid"]
    </dt>
    <dd>
      string(1) "0"
    </dd>
  </details>
  
  <?php
  
    //TODO: better testcase dummies
    include('dummy-var.php'); //loads dummy object $var
    
    include('do_dump.php'); //loads original `do_dump()` function
    include('cheapass_krumo.php'); //loads modified krumo function
  
    cheapass_krumo($var);
  
  ?>
  
</body>
</html>