<?php
class Captcha {
    
    //驗證碼內容
    public $text = '1234567890';
    //儲存驗證碼文字
    public $captchaString = '';
    //驗證碼長度
    public $captchaLength = 6;
    // 圖片寬
    public $image_width = 100;
    // 圖片高
    public $image_height = 30;
    //字型檔
    public $font_file = 'BrushScript.ttf';
    
    function Captcha()
    {
        //$this->text = '1234567890';
        //$this->captchaString = '';
        //$this->captchaLength = 6;
    }
    
    
    function generateCaptha()
    {
        // 產生種子, 作圖形干擾用
        srand((double)microtime() * 1000000);
        $length = strlen($this->text);
        // 隨機取出 6 個字
        for ($i = 0; $i < $this->captchaLength; $i++)
        {  
            $num = rand(0, $length - 1);
            $this->captchaString .= $this->text[$num];
        }
        // 儲存至 Session 中
        //$_SESSION['captcha'] = $this->captchaString;
        
        // 建立圖片物件
        $im = imagecreatetruecolor($this->image_width, 28);
        // 圖片底色
        $backgroupd_color = imagecolorallocate($im, 255, 239, 239);
        // 文字顏色
        $font_color = imagecolorallocate($im, 0, 0, 0);
        // 干擾線條顏色
        $gray1 = imagecolorallocate($im, 200, 200, 200);
        // 干擾像素顏色
        $gray2 = imagecolorallocate($im, 200, 200, 200);
        // 設定圖片底色
        imagefill($im, 0, 0, $backgroupd_color);
        // 底色干擾線條
        for ($i = 0; $i < 10; $i++)
        {
            imageline($im, rand(0, $this->image_width), rand(0, $this->image_height), rand($this->image_height, $this->image_width), rand(0, $this->image_height), $gray1);
        }
        /*
        imagettftext (int im, int size, int angle, int x, int y, int col, string fontfile, string text)
        im 圖片物件
        size 文字大小
        angle 0度將會由左到右讀取文字，而更高的值表示逆時鐘旋轉
        x y 文字起始座標
        col 顏色物件
        fontfile 字形路徑，為主機實體目錄的絕對路徑，
        可自行設定想要的字型
        text 寫入的文字字串
        */
        
        //利用true type字型來產生圖片
        $font_path = WEB_PATH.'modules/fonts/'.$this->font_file;
        //echo $font_path;
        
        imagettftext($im, 20, 0, 14, 23, $font_color, $font_path , $this->captchaString);
        
        // 干擾像素
        for ($i = 0; $i < 90; $i++)
        {
            imagesetpixel($im, rand() % $this->image_width, rand() % $this->image_height, $gray2);
        }
        
        imagepng($im);
        imagedestroy($im);
    }
}















?>