<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sarabel PHP Framework</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

    <div class="container">
        <?php require $block_header;?>
        <?php if (session_message(true)):?>
            <div class="bg-primary">
                <?php echo session_message(); ?>
            </div>
        <?php endif;?>
        <?php echo $block_content; ?>
        <?php require $block_footer;?>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/jquery-3.2.1.slim.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>