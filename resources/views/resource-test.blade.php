<!doctype html>
<?php
    use \App\Http\Controllers\TableController;
    use Symfony\Component\Process\Process;
    use Symfony\Component\Process\Exception\ProcessFailedException;
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>test</title>
    </head>
    <body>
        <?php
            $input = 'test';
            $links = TableController::retrieve_same($input);
            if($links == 'NULL') {
                // runs python script
                $process = new Process(['python', '../public/python-scrips/TextAnalysis/resourceGathering.py']);
                $process->run();
                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }
                $links = $process->getOutput();
            }
            $output = TableController::store($input, $links);
            echo implode(" ", $links);
        ?>
    </body>
</html>
