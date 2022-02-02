<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;


/**
 * The PythonModel class provides static methods for easy execution Python of
 * Python scripts.
 * 
 * All methods in this class are static, and therefore this class cannot be
 * instatiated. This class also cannot be extended as should be no further
 * implementation.
 * 
 * @author   Mark Rigden
 * @version  1.0
 */
final class PythonModel extends Model {
    // The location or system variable to Python
    private const PYTHON_LOCATION        = "python";
    // The parent directory where the Python scripts are located
    private const SCRIPTS_DIRECTORY_PATH = "../python-scrips/";
    // The path to the chatbot script
    private const CHATBOT_FILE_PATH      = "TextAnalysis/chatbot.py";
    // The path to the Heroku test script
    private const PYTHON_TEST_FILE_PATH  = "PythonTest.py";
    
    /**
     * The class constructor.
     * 
     * Access is private so no instances can be created outside the class,
     * however there is no need for instances to be created within the class as
     * all methods and fields are static.
     */
    private function __construct() {
        
    }
    
    /**
     * Runs the given Python script, passing any given variables to the script.
     * 
     * If the file doesn't exist, or isn't a Python file, null will be returned.
     * 
     * This will return anything printed within the Python script as one string.
     * If nothing was printed, null will be returned. If an error occurred
     * during the script being ran, anything printed up until the error will be
     * returned.
     * 
     * @param  string $filePath  the file path to the Python script
     * @param  array  $args      the variables to be passed to the Python
     *                           script
     * @return string|array|null the output of the Python script, or null
     */
    private static function runScript(
            string $filePath,
            array $args) {
        
        $fullFilePath = PythonModel::SCRIPTS_DIRECTORY_PATH . $filePath;
        
        if (file_exists($fullFilePath)
                && PythonModel::isPythonFile($fullFilePath)) {
            
            $process = PythonModel::getNewProcess($fullFilePath, $args);
            
//            print_r("<p><code>Executing `"
//                    . $process->getCommandLine()
//                    . "`...</code></p><br>");
            
            $process->run();
            
            print_r($process->getErrorOutput());
            
            $output = $process->getOutput();
            $json   = json_decode($output);
            
            return (json_last_error() === JSON_ERROR_NONE
                        && $json !== null)
                    ? $json
                    : $output;
        }
        
        return null;
    }
    
    /**
     * Runs the ChatBot script, passing any given variables to the script.
     * 
     * @param  mixed ...$args    the variables to be passed to the Python script
     * @return string|array|null the output of the Python script, or null
     */
    public static function runChatbot(...$args) {
        return PythonModel::runScript(PythonModel::CHATBOT_FILE_PATH,
                                      $args);
    }
    
    /**
     * Runs the PythonTest script, passing any given variables to the script.
     * 
     * @param  mixed ...$args    the variables to be passed to the Python script
     * @return string|array|null the output of the Python script, or null
     */
    public static function runTest(...$args) {
        return PythonModel::runScript(PythonModel::PYTHON_TEST_FILE_PATH,
                                      $args);
    }
    
    /**
     * Returns the file extension of the given file path.
     * 
     * @param  string $filePath the path to the file
     * @return string           the file extension
     */
    public static function getFileExtension(string $filePath) : string {
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }
    
    /**
     * Returns whether or not the file at the given path is a Python file.
     * 
     * @param  string $filePath the path to the file
     * @return bool             whether or not the file is a Python file
     */
    public static function isPythonFile(string $filePath) : bool {
        return PythonModel::getFileExtension($filePath) === "py";
    }
    
    /**
     * Returns a new Process object that can run the file at the given path,
     * passing any variables to the file.
     * 
     * @param  string $filePath the path to the file
     * @param  array  $args     the variables to be passed to the file
     * @return Process          the Process object
     */
    private static function getNewProcess(
            string $filePath,
            array $args) : Process {
        
        return new Process(array(PythonModel::PYTHON_LOCATION,
                                 $filePath,
                                 json_encode($args)));
    }
}