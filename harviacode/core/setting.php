<?php
error_reporting(0);
require_once 'helper.php';
$res = '';
$get_setting = readJSON('settingjson.cfg');

if (isset($_POST['save'])) {
    $target = $_POST['target'];
    $target_module = $_POST['target_module'];
    $string = '{
"target": "' . $target . '",
"target_module": "' . $target_module . '",
"copyassets": "0"
}';

    $hasil_setting = createFile($string, 'settingjson.cfg');
    $res = '<p>Setting Updated</p>';
}
?>
<!doctype html>
<html>
    <head>
        <title>Harviacode Codeigniter CRUD Generator</title>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-6">
                <?php echo $res; ?>
                <form class="row" action="setting.php" method="POST">
                    <h2>Target standard generation (MVC)</h2>
                    <div class="form-group col-sm-12">
                        <?php $target = $_POST['target'] ? $_POST['target'] : $get_setting->target; ?>
                        <input class="form-control" type="text" name="target" value="<?php echo $target ?>" >
                    </div>
                    <div class="form-group col-sm-12">
                        <h2>Target module generation (HMVC)</h2>
                        <?php $target_module = $_POST['target_module'] ? $_POST['target_module'] : $get_setting->target_module; ?>
                        <input class="form-control" type="text" name="target_module" value="<?php echo $target_module ?>">
                    </div>
                    <input type="submit" value="Save" name="save" class="btn btn-primary" />
                    <a href="../index.php" class="btn btn-default">Back</a>
                </form>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </body>
</html>

