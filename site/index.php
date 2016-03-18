<!DOCTYPE html>
<?php
require_once('./config.php');
require_once('./utils.php');

$is_lock = CheckLockFile();
$status = explode("\n", GetStatusFile());

$msg = $_GET['msg'];
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        
        <title><?php echo $site_title; ?></title>
        
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <?php if ($is_lock) { ?>
    <body class="lock-file-activated">
    <?php } else { ?>
    <body class="">
    <?php } ?>
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <!--
                        <li role="presentation" class="active"><a href="#">Home</a></li>
                        <li role="presentation"><a href="#">About</a></li>
                        <li role="presentation"><a href="#">Contact</a></li>
                        -->
                    </ul>
                </nav>
                <h3 class="text-muted"><?php echo $site_title; ?></h3>
            </div>
            
            <?php if ($msg == 'success' & $is_lock) { ?>
            <p class="alert alert-success">You have updated the status.</p>
            <?php } elseif ($msg == 'error' & $is_lock) { ?>
            <p class="alert alert-danger">Something failed.</p>
            <?php } ?>
            
            <?php
                if ($is_lock) {
            ?>
                <p class="alert alert-info">Will be open to submissions again at <?php echo StatusFileCreatedPlus15Minutes(); ?>.</p>
                <div class="jumbotron">
                    <?php
                    $line1 = str_replace(' ', '<span class="bull">&bull;</span>', $status[0]);
                    $line2 = str_replace(' ', '<span class="bull">&bull;</span>', $status[1]);
                    ?>
                    <p class="line-1" id="js-line-1"><?php echo $line1; ?></p>
                    <p class="line-2" id="js-line-2"><?php echo $line2; ?></p>
                </div>
            <?php } else { ?>
                <p class="alert alert-danger"><?php echo $pg_con_warning; ?></p>
                
                <div class="jumbotron">
                    <?php
                    $line1 = str_replace(' ', '<span class="bull">&bull;</span>', $status[0]);
                    $line2 = str_replace(' ', '<span class="bull">&bull;</span>', $status[1]);
                    ?>
                    <p class="line-1" id="js-line-1"><?php echo $line1; ?></p>
                    <p class="line-2" id="js-line-2"><?php echo $line2; ?></p>
                </div>
                
                <div class="form">
                    <form action="send.php" method="post" autocomplete="off">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" id="input-line-1" name="line-1" aria-describedby="input-line-1-character-count" maxlength="<?php echo $line_max_length; ?>" inputmode="verbatim">
                            <span class="input-group-addon" id="input-line-1-character-count"><?php echo $line_max_length; ?></span>
                        </div>
                    
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" id="input-line-2" name="line-2" aria-describedby="input-line-2-character-count"  maxlength="<?php echo $line_max_length; ?>" inputmode="verbatim">
                            <span class="input-group-addon" id="input-line-2-character-count"><?php echo $line_max_length; ?></span>
                        </div>
                        
                        <div class="form-group form-group-lg">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            
            <footer class="footer">
                <p>Site made by <a href="http://mylesb.ca/">Myles Braithwaite</a> with <svg xmlns="http://www.w3.org/2000/svg" class="heart" width="128" height="128" viewBox="0 0 128 128"><g class="iconic-heart-lg iconic-container iconic-lg" data-width="128" data-height="112" display="inline" transform="translate(0 8)"><path d="M118.041 9.959c-6.152-6.153-14.652-9.959-24.041-9.959-9.389 0-17.889 3.805-24.041 9.959-2.361 2.36-4.372 5.068-5.959 8.037-1.587-2.969-3.597-5.677-5.959-8.037-6.152-6.153-14.652-9.959-24.041-9.959-9.389 0-17.889 3.805-24.041 9.959-6.154 6.152-9.959 14.652-9.959 24.041 0 9.389 3.805 17.889 9.959 24.041l54.041 53.959 54.041-53.959c6.154-6.152 9.959-14.652 9.959-24.041 0-9.389-3.805-17.889-9.959-24.041z" class="iconic-property-fill" /></g><g class="iconic-heart-md iconic-container iconic-md" data-width="32" data-height="28" display="none" transform="scale(4) translate(0 2)"><path d="M16 5s-.516-1.531-1.49-2.51c-1.534-1.542-3.663-2.49-6.01-2.49s-4.472.951-6.01 2.49c-1.539 1.538-2.49 3.663-2.49 6.01s.951 4.472 2.49 6.01l13.51 13.49 13.51-13.49c1.539-1.538 2.49-3.663 2.49-6.01s-.951-4.472-2.49-6.01c-1.538-1.538-3.663-2.49-6.01-2.49s-4.476.948-6.01 2.49c-.974.979-1.49 2.51-1.49 2.51z" class="iconic-property-fill" /></g><g class="iconic-heart-sm iconic-container iconic-sm" data-width="16" data-height="14" display="none" transform="scale(8) translate(0 1)"><path d="M14.828 1.171c-.724-.724-1.724-1.171-2.828-1.171s-2.105.448-2.828 1.171c-.724.724-1.056 1.552-1.172 1.829-.12-.277-.448-1.105-1.172-1.829s-1.724-1.171-2.828-1.171-2.105.448-2.828 1.171c-.724.724-1.172 1.724-1.172 2.829 0 1.105.448 2.104 1.172 2.828l6.828 6.828 6.829-6.828c.724-.724 1.172-1.724 1.172-2.828 0-1.105-.448-2.105-1.172-2.829z" class="iconic-property-fill" /></g></svg> in Toronto.</p>
            </footer>
        </div>
        
        <script src="/assets/javascript/libs/jquery.js"></script>
        <script src="/assets/javascript/libs/jquery.lettering.js"></script>
        <script src="/assets/javascript/libs/jquery.fittext.js"></script>
        <script src="/assets/javascript/libs/bootstrap.min.js"></script>
        <script src="/assets/javascript/script.js"></script>
    </body>
</html>