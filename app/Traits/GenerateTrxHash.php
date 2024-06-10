<?php 

namespace App\Traits;


trait GenerateTrxHash
{
    function generateTrxHash($length) {
        $bytes = random_bytes($length); // Generate random bytes (each byte corresponds to 2 characters in a hexadecimal string)
        return bin2hex($bytes); // Convert random bytes to a hexadecimal string
    }
}