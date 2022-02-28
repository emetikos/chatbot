<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


/**
 * The UploadController class contains methods to upload file(s) to the server.
 *
 * @author   Mark Rigden
 * @version  1.0
 * @since    1.0
 */
class UploadController extends Controller {
    private const PDF_DIRECTORY = "../public/pdf/";

    /**
     * Saves the PDF that was uploaded to the server.
     *
     * If no file was sent, the file is not a PDF or an error occurred, the file
     * will not be saved and false will be returned.
     *
     * If the directory the file is being saved to does not exist, it will be
     * created along with any parent directories.
     *
     * @return bool  Whether the uploaded file was saved to the server.
     */
    public static function pdf() : bool {
        try {
            $PDF = $_FILES["pdf"] ?? null;

            // If no file was sent or the file type is not a PDF
            if (empty($PDF) || $PDF["type"] !== "application/pdf") {
                return false;
            }

            // Create the directory if it does not exist and any parent
            // directories
            if (!file_exists(UploadController::PDF_DIRECTORY)) {
                mkdir(UploadController::PDF_DIRECTORY, 0777, true);
            }

            $filePath = UploadController::PDF_DIRECTORY . $PDF["name"];
            // Update the file name if it already exists to one that doesn't
            $availableFilePath = UploadController
                                     ::toAvailableFilePath($filePath);

            // Save the uploaded file to the server, updating the session
            // variables
            if (move_uploaded_file($PDF["tmp_name"], $availableFilePath)) {
                Session::put("fileSubmit", "True");
                Session::put("readySubmit", "False");
                Session::put("file", pathinfo($availableFilePath, PATHINFO_BASENAME));

                return true;
            }
        }
        catch (Exception $e) {

        }

        return false;
    }

    /**
     * Updates the given file path to one that does not exist by appending an
     * incrementing number to the filename until a file at that path does not
     * exist. If a file at the given path initial does not exist, a number
     * won't be appended, returning the original path.
     *
     * E.g., if a file exists with the name example.txt, it will have an
     * incrementing number appended to it, such as:
     *     example 1.txt
     *     example 2.txt
     *     example 3.txt
     * until a filename with that name and number does not exist.
     *
     * @param string $path  the file path
     * @return string       the updated file path, or the original path if a
     *                      file initial does not exist
     */
    private static function toAvailableFilePath(string $path) : string {
        $newPath = $path;
        $filename = pathinfo($path, PATHINFO_FILENAME);
        $count = 0;

        // Append $count to the original filename until a file with the updated
        // name does not exist
        while (file_exists($newPath)) {
            $count++;
            $newPath = str_replace($filename, "$filename $count", $path);
        }

        return $newPath;
    }
}


