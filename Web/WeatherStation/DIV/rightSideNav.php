
<meta http-equiv="Content-Language" content="en-us">
<title>PHP MySQL Typeahead Autocomplete</title>
<meta charset="utf-8">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
<link rel="stylesheet" href="css/Style.css">
    <style>
        
        .tt-hint,
        .ddd {
            border: 2px solid #CCCCCC;
            border-radius: 8px 8px 8px 8px;
            font-size: 14px;
            height: 35px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width:100%;
        }

        .tt-dropdown-menu {
            
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
            width:100%;
            
        }
    </style>
    <script>
        $(document).ready(function() {

            $('#FromDate').typeahead({
                name: 'search',
                remote: 'search.php?query=%QUERY'

            });

        })
        $(document).ready(function() {

            $('#ToDate').typeahead({
                name: 'search',
                remote: 'search.php?query=%QUERY'

            });

        })
        $(document).ready(function() {

            $('#Place').typeahead({
                name: 'searchPlace',
                remote: 'searchPlace.php?query=%QUERY'

            });

        })
    </script>
            
<fieldset>
    <div class="form-group">
      <label class="control-label" for="focusedInput">From</label>
     <input type="text" name="ToDate" id="FromDate" size="30" class="ddd form-control" placeholder="Enter start time" >
    </div>
    <div class="form-group">
      <label class="control-label" for="focusedInput">To</label>
     <input type="text" name="FromDate" id="ToDate" size="30" class="ddd form-control" placeholder="Enter end time" >
    </div>
    <div class="form-group">
      <label class="control-label" for="focusedInput">Place</label>
     <input type="text" name="Place" id="Place" size="30" class="ddd form-control" placeholder="Enter the place" >
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</fieldset>
        
 
</html>
