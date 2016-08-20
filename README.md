# Tạo ra các file view theo mẫu bằng artisan trong cmd



#Cài đặt gói vào file composer.json 

  
       "hoanghiep/template": "dev-master",
       "hoanghiep/library":"dev-master"
       
       Chạy lệnh : composer install

b2. Chạy lệnh cập nhập

    composer dump-autoload

b3. Thêm dịch vụ trong config/app.php

    'providers' => [
       /***** ****/
       Hoanghiep\Template\HoanghiepTemplateProvider::class,
       Hoanghiep\Library\HoanghiepLibraryProvider::class,
      ]
 
 b4. Chạy lệnh xuất bản các tập tin cần thiết 
 
      php artisan vendor:publish
  
  render  :
  
    [`\public\library`] => thư mục chứa các thư viện css + js + botstrap + databasetable javascript.
    
    [`\config\hoanghiep.php`] => thư  mục khai báo nơi chứa file mẫu
  
    [`\hoanghiep\blade`] => chứa các file views mẫu để sao chép
    
    [`\app\Console\Commands\MakeViewCommand.php`] => thư mục chứa file lệnh artisan đã viết sẵn
  
    [`\resources\views\layouts`] =>  chứa các file khung bố cục đã viết mẫu
    
    [`\resources\views\content-static`] ==> chứa các file nội dung tĩnh như html + văn bản

  
  
  b5. Cài đặt thư mục chứa các tập tin mẫu trong config/hoanghiep => blade:

  mặc định là thư mục gốc hoanghiep/blade bạn có thể thiết lập nơi chứa các tập tin mẫu từ nơi khác nhưng yêu cầu file cùng tên.
  
      return [
          'balde' => "hoanghiep/blade", // thư mục chứa file blade mẫu
           "url_view"=>"resources/views" // nơi thư mục và file sẽ được tạo ra tiếp theo có thể đổi sang sang thư mục khác thư mục gốc
      ];

  
  
  b6. Thêm lệnh artisan mới  `App\Console\Kernel.php`

      thêm vào biến $commands 
    
            protected $commands = [
                // Commands\Inspire::class,
                 Commands\MakeViewCommand::class
            ];
  
    
  B7. Lệnh chạy tạo ra các blade theo file mẫu.
  
Cú pháp  :  php artisan make:view fooder1_fooder_2_fooder_3 --blade
   
      
      ===== Tạo ra các file trong  `resource/views/fooder1/fooder2/fooder3/blade` ====
      
      Lựa chọn các file cần tạo blade == 
      
     name blade ? [show_fields]:
    
      [0] create
      [1] edit
      [2] index
      [3] show
      [4] show_fields
      [5] table
      [6] all
 >

  
  
  ==> ok end !
