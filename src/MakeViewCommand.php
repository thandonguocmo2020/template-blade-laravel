<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;

class MakeViewCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {fooder?} {--blade}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new blade template.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $path_template_blade = config("hoanghiep.balde");
 

// nhận view nhập vào các thư mục cách nhau bằng dấu _
        $path = $this->argument('fooder');
        if ($path != null) {
// lấy url vị trí tạo thư mục
            $path_new = $this->getPath($path);
// tạo thư mục mới
            $this->createPath($path_new);
// lựa chọn file cần tạo
            if ($this->option("blade")) {
                $default = "0";
                $this->line('create blade views');
                $array_file = config("hoanghiep.create_file");
                $name = $this->choice('name blade ?', $array_file, $default);

              // nếu lựa chọn không tồn tại chỉ tạo thư mục
                $this->createFile($name, $path_template_blade,$path_new);
            } else {
                $this->info("view blade not create !");
            }
        } else {
            $this->error("view fooder ?");
            die();
        }




//        $this->info("File {$path} created.");
    }

    /**
     * Get the view full path.
     *
     * @param string $view
     *
     * @return string
     */
// get path command
    public function getPath($path) {
        $string = str_replace('_', ' ', $path);
        $str_lower = Str::lower($string);
        $url = Str::slug($str_lower, $separator = '/');
        $path = config("hoanghiep.url_view")."/"."$url";
        return $path;
    }

// create fooder
    public function createPath($path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    public function createFile($array_file, $path_template_blade, $path) {

        if ($array_file == "all") {
           
            $array_file = config("hoanghiep.create_file");

            foreach ($array_file as $key => $value) {
                
                if($value == "all"){
                    continue;
                }
                $file_root = $path_template_blade  ."/". "$value" . ".blade.php";
                $file_new = $path . "/$value" . ".blade.php";
                if (!file_exists($file_new)) {
                    File::copy("$file_root", "$file_new");
                    $this->info("Create $value success.");
                } else {
                    $this->error("File $value exists.");
                }
            }
        } else {
            $file_root = $path_template_blade ."/". "$array_file" . ".blade.php";
            $file_new = $path . "/$array_file" . ".blade.php";
            if (!file_exists($file_new)) {
                File::copy("$file_root", "$file_new");
                $this->info("Create $array_file success.");
            } else {
                $this->error("File $array_file exists.");
            }
        }
    }

}
