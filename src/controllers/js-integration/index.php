<?php

if (count($_POST)> 0){
    switch ($_POST['action']){
        case '#test':
            echo "<h1>Hello David: ".date('Y-m-d H:i:s')."</h1>";
            echo '<pre>'.print_r($_POST,true).'</pre>';
            break;
        case '#test2':
            echo "<h1>Forgot password</h1>";
            echo '<pre>'.print_r($_POST,true).'</pre>';
            break;
    }
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JS-Integration</title>
</head>
<body>
<div class="container">
    <h1>Hello World!</h1>
</div>
<ul>
    <li><a class="dynamic" href="#test">Change content</a></li>
    <li><a class="dynamic" href="#test2">Forgot password</a></li>
</ul>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script>

    $(function(){
        $('a, button, input[type=submit]').not('.clickable').click(function(ev){
            $(this).addClass('clickable');
            ev.preventDefault();
            $.ajax({
                url: "<?php echo $_GET['q'];?>",
                method: 'POST',
                data: {'action': ev.target.hash},
                success: function(data){
                    $('.container').html(data);
                }
            });
        });
    });
</script>
</body>
</html>


