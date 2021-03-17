<?php

namespace App;

use App\Logger;

class FileLogger extends Logger
{
    public function log(string $date, string $time, string $description)
    {
        $file = fopen("./logs/" . $this -> fileName . ".txt", "a") or die("Couldn't open the file");
        fwrite($file, $date . " | " . $time . " | " . $description . PHP_EOL);
        fclose($file);
    }
}
