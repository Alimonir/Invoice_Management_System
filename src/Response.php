<?php declare(strict_types=1);

namespace Invoice;

class Response implements ResponseInterface{
    private string $template;
    public function __construct(private readonly string $templateDir,
    private array $vars = []){
       /**i add it to get full dir for template function*/
    }
    public function template(string $name,array $vars = []): void{
        
        $this->addVars($vars);
        $this->template =$this->templateDir . "/". $name .'.php';//name of template
        /**string(77) "C:\xampp\htdocs\dashboard\InvoiceManagementSystem/templates/page/settings.php" */
    }
    public function addVars(array $vars){
        /**
 * Adds variables to the existing array of variables.
 *
 * This function takes an associative array of variables and merges it
 * with the existing `$vars` property of the class. The array typically
 * includes information about the invoice, such as a title and ID.
 *
 * Example of input:
 * array(
 *     "title" => "Invoices",
 *     "id" => "12345"
 * )
 *
 * @param array $vars Associative array with keys "title" (string) and "id" (string).
 * @return void
 */
        $this->vars = array_merge($this->vars,$vars);
    }

    public function render(): void{
        if (empty($this->template)) {
            return;
        }

        ob_start();//Get the contents of the active output buffer and turn it off This function calls the output handler (with the PHP_OUTPUT_HANDLER_CLEAN and PHP_OUTPUT_HANDLER_FINAL flags)
       
       extract($this->vars, EXTR_SKIP);//flage mean if there is a collision do not overwrite the existing variable 
        include $this->template;
        $content = ob_get_clean();//Get the contents of the active output buffer and turn it off This function calls the output handler (with the PHP_OUTPUT_HANDLER_CLEAN and PHP_OUTPUT_HANDLER_FINAL flags)
        echo $content;
    }
}
/**
 * 
 * ob_start();
This function starts output buffering.
Output buffering is a technique where PHP stores any output (like HTML or echoed strings) in a temporary internal buffer instead of immediately sending it to the browser.
Starting this buffer means any subsequent output from included files or echoed statements won’t be directly sent to the output (screen/browser); instead, it will be stored in memory.
2. include $this->template;
Here, PHP includes the template file specified by $this->template.
$this->template is expected to be a string containing the path to a PHP file.
Any content generated within this included template (like HTML, or variables rendered in it) will now go into the output buffer instead of directly being sent to the browser.
This lets you capture the output as a string, allowing you to manipulate or modify it before displaying.
3. $content = ob_get_clean();
ob_get_clean() stops output buffering and returns the contents of the buffer as a string, storing it in $content.
Once ob_get_clean() is called, the buffer is erased and closed. This means any output that was captured is now stored in $content, and the buffer is no longer active.
$content now holds all the HTML or output generated by the included template file, making it easy to manipulate or use as needed before it’s displayed.
 */