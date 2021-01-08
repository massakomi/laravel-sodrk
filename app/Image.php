<?php

namespace App;

/*

// ???? ??????
$im = new Image();
$im->open('test.jpg');
//$im->create($width=400, $height=300, $bg='ffffff', $type='png|jpg|gif')


// ???????
//$im->resize(400, 400);
//$im->scale(0.5, 0.5);
//$im->fitto(500);
//$im->crop(300, 300, 'center|left|right');
//$im->addBorder($thick=50, $color='ffeeff');
//$im->line($x1=0, $y1=0, $x2=300, $y2=300, $color='#7E2D3A', 5);
//$im->write($text='Priora Style', $x2=300, $y2=300, $font=5, $color='#7E2D3A');
//$im->polygon($points, $numPoints, $color=null, $filled=true);
//$im->ellipse($x1=300, $y1=300, $x2=100, $y2=100, $color='#7E2D3A', $filled=0);
//$im->dashline($x1=300, $y1=300, $x2=300, $y2=600, 5);
//$im->addImage('add.jpg', $x=0, $y=0);
//$im->toGray($dither=true);

//$im->add_fixed_text(str_repeat('Text text all goods '."\n", 10), $color='ffffff', $font=5, $x=10, $y=10);

$im->fontFile = 'times.ttf';

// ????????
$im->fontSize = 100;
$im->fontAngel = 10;
$im->addTtfText('?? ???', $x=100, $y=500, $color='#BA4651');

 // ???????- ? ????? ??????? ?????
//$im->fontSize = range(50, 100);
//$im->fontAngel = range(-10, 10);
//$im->textYOffset = range(10, 50);
//$im->fontColors = array('ffffff', '000000', 'BA4651', '6C5753');
//$im->addTtfText('?? ???', $x=100, $y=500, $color='#BA4651');


// ????? ??????
$im->show($quality=100, $imageSavePath=null, $destroy=true);
//$im->save($quality=100, $imageSavePath=null, $destroy=true);

// ?? ????
// $data = Image::getInfo($file);

*/

/**
 * ????? ??? ????????
 * ??? 2.1 (12 ???2013)
 */
class Image
{

	// resource ????
	public $im;

	// ???? ????
	public $type, $width, $height, $mime, $attributes;

	// ?? ???? jpg ????
	public $bits, $channels, $color;

	/**
	 *
	 */
	function Image()
	{

	}


	/**
	 * ??? ??? ????
	 *
	 * @param  integer ???
	 * @param  integer ???
	 * @param  string  ?? ?? hex (default ffffff)
	 * @param  string  ?????(png, jpg, gif) (default png)
	 */
	public function create($width, $height, $bg=null, $type=null)
	{
		if ($width <= 0 || $height <= 0) {
			return false;
		}
		$this->width      = intval($width);
		$this->height     = intval($height);
		$this->im         = imagecreate($this->width, $this->height);
		$this->type       = $type == null ? 'png' : $type;
		$this->mime       = 'image/' . $this->type;
		$this->attributes = 'width="'.$this->width.'" height="'.$this->height.'"';
		$this->_createColor($bg, 'ffffff');
	}

	/**
	 * ??????????
	 *
	 * @param  string   ?? ????
	 * @return resource ????
	 */
	public function open($imagePath)
	{
		$imageInfo = $this->getInfo($imagePath);
		if (count($imageInfo) == 0) {
			return false;
		}
		foreach ($imageInfo as $k => $v) {
			if (!is_numeric($k)) {
				$this->$k = $v;
			}
		}
		if ($this->type == 'jpg') {
			$this->im = imagecreatefromjpeg($imagePath);
		} else if ($this->type == 'gif') {
			$this->im = imagecreatefromgif($imagePath);
		} else if ($this->type == 'png') {
			$this->im = @imagecreatefrompng($imagePath);
		}
		return $this->im;
	}

	/**
	 * ?????????????????????? ??
	 * ???? ??? ?????? ????? ??? ?????? ???!
	 *
	 * @param  integer ?????????
	 * @param  string  ??, ?? ?? ????? ????
	 * @param boolean  ?? ? ?????? ???
	 */
	public function show($quality=100, $imageSavePath=null, $destroy=true)
	{
		$quality = intval($quality);
		if ($imageSavePath == null) {
			header ('Content-type: ' . $this->mime);
		}
		if (!is_resource($this->im) || get_resource_type($this->im) != 'gd') {
			return false;
		}
		if ($this->type == 'jpg') {
			imagejpeg($this->im, $imageSavePath, $quality) ;
		} else if ($this->type == 'png') {
			$imageSavePath == null ? imagepng($this->im) : imagepng($this->im, $imageSavePath);
		} else if ($this->type == 'gif') {
			$imageSavePath == null ? imagegif($this->im) : imagegif($this->im, $imageSavePath);
		}
		if ($destroy) {
			imagedestroy($this->im);
		}
	}

	/**
	 * ????? ?????????
	 * ?? ?? ???- ?? ? ?????. ?? ????? ??- ???? ??
	 *
	 * @param  integer ?????????
	 * @param  string  ??, ?? ?? ????? ????
	 * @param boolean  ?? ? ?????? ???
	 * @param srting  ?? ????
	 */
	public function save($quality=100, $imageSavePath=null, $destroy=true)
	{
		$quality = intval($quality);
		if ($imageSavePath == null) {
			$imageSavePath = time() . '.' . $this->type;
			if (file_exists($imageSavePath)) {
				$imageSavePath = time() .'_'. rand(1,100) . '.' . $this->type;
			}
		}
		if (!strchr($imageSavePath, '.')) {
			$imageSavePath = $imageSavePath . '.' . $this->type;
		}
		$this->show($quality, $imageSavePath, $destroy);
		return $imageSavePath;
	}

  	/**
	 * ???? ??? ????
	 *
	 * @param  integer ???
	 * @param  integer ???
     * @param boolean ??? ????
	 */
	public function resize($width, $height)
	{
		$oldImage  = $this->im;
		$oldWidth  = $this->width;
		$oldHeight = $this->height;
		$this->im  = imagecreatetruecolor($width, $height);
		$result    = imagecopyresampled($this->im, $oldImage, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight);
		if ($result) {
			$this->width = $width;
			$this->height = $height;
		}
		return $result;
	}

  	/**
	 * ?????? ??????? ???????
	 *
	 * @param  integer ??? ???? ????
	 * @param  integer ??? ???? ????
     * @param boolean ??? ????
	 */
	public function scale($scaleWidth, $scaleHeight)
	{
		$width  = round($this->width  * $scaleWidth);
		$height = round($this->height * $scaleHeight);
		return $this->resize($width, $height);
	}

  	/**
	 * ??????? ???? ??????????? ???? $maxSide
	 *
	 * @param  integer ??????? ????
     * @param boolean ??? ????
	 */
	public function fitto($maxSide)
	{
		$width  = $this->width;
		$height = $this->height;
		if ($width > $height) {
			$height = round (round ($maxSide / $width, 3) * $height);
			$width  = $maxSide;
		} else {
			$width  = round (round ($maxSide / $height, 3) * $width);
			$height = $maxSide;
		}
		return $this->resize($width, $height);
	}

  	/**
	 * ???????? ??? ????????$w * $h ??????? ????
	 *
	 * @param  integer ???
	 * @param  integer ???
	 * @param  string  ?????? center - ??? (default), left - ??/??? right - ??/???
	 */
	public function crop($w, $h, $cropType=null)
	{
		$srcW = $this->width;
		$srcH = $this->height;
		$ks   = $srcW / $srcH; // ??????? ? ?????????
		$kd   = $w / $h;       // ??????? ? ???????????
		$ofX  = $ofXr  = 0;
		$ofY  = $ofYr  = 0;
		if ($kd > $ks) {
			$a    = $srcW / $kd;
			$ofY  = round(($srcH - $a) / 2);
			$ofYr = round($srcH - $a);
			//$srcH = $a;
		} else {
			$a    = $srcH * $kd;
			$ofX  = round(($srcW - $a) / 2);
			$ofXr = round($srcW - $a);
			//$srcW = $a;
		}

		$imd  = imagecreatetruecolor ($w, $h);
		if ($cropType == 'right') {
			imagecopyresampled($imd, $this->im, 0, 0, $ofXr, $ofYr, $w, $h, $srcW, $srcH);
		} else if ($cropType == 'left') {
			imagecopyresampled($imd, $this->im, 0, 0, 0,     0,     $w, $h, $srcW, $srcH);
		} else {
			//imagecopyresampled($imd, $this->im, 0, 0, $ofX,  $ofY,  $w, $h, $srcW, $srcH);


		}
		$this->im = $imd;
	}

	/**
	 * Кроп с фоновым цветом
	 */
	public function cropColor($w, $h, $bg='fff')
	{
		$srcW = $this->width;
		$srcH = $this->height;
		$ks   = $srcW / $srcH;
		$kd   = $w / $h;

		$imd  = imagecreatetruecolor ($w, $h);

		$color = $this->_createColor($bg);
		imagefilledrectangle($imd, 0, 0, $w, $h, $color);

		//
		if ($kd > $ks) {
			$dstW = $w * $ks;
			$dstH = $h;
			$dstX = ($w - $dstW) / 2;
			$dstY = 0;
		} else {
			$dstW = $w;
			$dstH = $h * (1 / $ks);
			$dstX = 0;
			$dstY = ($h - $dstH) / 2;
		}
		//var_dump("$ks,  $kd"); exit; //  string(19) "1.9607843137255, 1"

		// *src не меняем, нужно полностью картинку запихнуть в рамку
		imagecopyresampled($imd, $this->im, $dstX, $dstY, $srcX=0, $srcY=0, $dstW, $dstH, $srcW, $srcH);

		$this->im = $imd;
	}

	/**
	 * ??? ???
	 *
	 * @param  integer ????
	 * @param  string  ?? hex (default 000000)
	 */
	public function addBorder($thick=null, $color=null)
	{

        $thick = abs(intval($thick));
		if ($thick == 0 || !isset($this->im)) {
			return;
        }
		$minSize = min($this->width, $this->height);
		if ($thick > $minSize / 2) {
			$thick = $minSize / 2;
		}
		$w     = $this->width;
		$h     = $this->height;
		$color = $this->_createColor($color, '000000');
		imagefilledrectangle($this->im,0,          0,          $w,        $thick - 1,  $color);  // up
		imagefilledrectangle($this->im,0,          $h - $thick,$w,        $h + $thick, $color);  // down
		imagefilledrectangle($this->im,0,          0,          $thick - 1,$h,          $color);  // left
		imagefilledrectangle($this->im,$w - $thick,0,          $w,        $h,          $color);  // right
	}


    /**
     * ??? ??? ? ?????? ???? ? (0,0) ???? ??? ??? ?????? (???????????)
     */
    public function line($x1, $y1, $x2, $y2, $color=null, $thick=1)
    {
        if ($color != IMG_COLOR_STYLED) {
            $color = $this->_createColor($color, '000000');
        }
        $y1 = ($y1 == 0 ? $y1 = 1 : $y1);
        $y2 = ($y2 == 0 ? $y2 = 1 : $y2);
        $x1 = ($x1 == $this->width ? $x1 = $x1 - 1 : $x1);
        $x2 = ($x2 == $this->width ? $x2 = $x2 - 1 : $x2);
        return Image::imagelinethick($this->im, $x1, $this->height - $y1, $x2, $this->height - $y2, $color, $thick);
    }


    /**
     * ??? ???? ?????? ???? ? (0,0) ???? ??? ??? ?????? (???????????)
     */
    public function write($string, $x, $y, $font, $color=null)
    {
        $color = $this->_createColor($color, '000000');
        return imagestring($this->im, $font, $x, $this->height - $y, $string, $color);
    }

    // ????? ?????????????????????
    public function add_fixed_text($text, $color='000000', $font = 1, $x = 10, $y = 10) {
        $color = $this->_createColor($color, '000000');
        $text = str_replace("\r", "\n", $text);
        $a = explode("\n", $text);
        foreach ($a as $k => $v) {
            if (trim($v) == '') {continue;}
            imagestring($this->im, $font, $x, $y, $v, $color);
            $y += $font + 10;
        }
    }

    /**
    * ???????????TTF ????
    * ????? ??????????? ??? ????? ?????? ?????!
    * ?? ??? ???, ???? ???? ? ?????
    *
    * ????! ?? ???? ???????, ??? ??? ????? ????????, ??????!!!
    */

    /**
    * ????? ??????? TTF ???? ($x, $y)
    */
    function addTtfText($text, $x=10, $y=10, $color='000000'){

        $color = $this->_createColor($color, '000000');

        // ?? ?????? ? ?? ????, ? ???????????
        if (is_array($this->fontSize) || is_array($this->fontAngel) || is_array($this->textYOffset) || is_array($this->fontColors)) {
            for ($i = 0; $i < mb_strlen($text); $i++) {
                $y2 = $y;

                $fontsize = is_array($this->fontSize) ? $this->fontSize[array_rand($this->fontSize)] : $this->fontSize;
                $angel = is_array($this->fontAngel) ? $this->fontAngel[array_rand($this->fontAngel)] : $this->fontAngel;
                if (is_array($this->fontColors)) {
                    $color = $this->fontColors[array_rand($this->fontColors)];
                	$color = $this->_createColor($color, '000000');
                }

                if (is_array($this->textYOffset)) {
                	$y2 += $this->textYOffset[array_rand($this->textYOffset)];
                }

/*
                // ????????
                $fontsize = $this->textFSize1;
                if (!empty($this->textFSize2)) {
                    $fontsize = rand($this->textFSize1, $this->textFSize2);
                }

                // ???????
                $angel = $this->textAngel1;
                if (!empty($this->textAngel2)) {
                    $angel = rand($this->textAngel1 + 360, $this->textAngel2 + 360);
                }

                // ???? ? Y
                if (!empty($this->textYOffset1)) {

                    if (!empty($this->textYOffset2)) {
                        $y2 = $y2 + rand($this->textYOffset1, $this->textYOffset2);
                    } else {
                        $y2 = $y2 + rand(0, $this->textYOffset1);
                    }
                }

                // ????????
                $color = $this->textColors[array_rand($this->textColors)];*/


                // ???? ???
                $symbol = mb_substr($text, $i, 1);
                $symbol = $this->to_ord(iconv('utf-8', 'windows-1251', $symbol));

                // ????? X-???? ?? ????? ???
                if ($i > 0) {
                    $x += $previousWidth * 1.1;
                }

                imagettftext($this->im, $fontsize, $angel, $x, $y2, $color, $this->fontFile, $symbol);

                $sz = imagettfbbox($fontsize, $angel, $this->fontFile, $symbol);
                $previousWidth = $sz[2] - $sz[0];
            }
        } else {
            //if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
            	//$text = $this->to_ord(iconv('utf-8', 'windows-1251', $text));
            //}
            imagettftext($this->im, $this->fontSize, $this->fontAngel, $x, $y, $color, $this->fontFile, $text);
        }
        return true;
    }



    /**
     * ??? ???????? ?????? ???? ? (0,0) ???? ??? ??? ?????? (???????????)
	 *
     * @param array   ???, ????? ???? ????, ?? points[0] = x0, points[1] = y0, points[2] = x1, points[3] = y1, etc.
     * @param integer ??? ?????????
	 * @param string  ???
	 * @param boolean ???? ????
     */
    public function polygon($points, $numPoints, $color=null, $filled=true)
    {
		foreach ($points as $k => $v) {
			if ($k % 2 == 1) {
				$points [$k] = $this->height - $v;
			}
		}
		$color = $this->_createColor($color, '000000');
		if ($filled) {
			return imagefilledpolygon($this->im, $points, $numPoints, $color);
		} else {
			return imagepolygon($this->im, $points, $numPoints, $color);
		}
    }

    // ????? ????????
    function addQuadre($topX, $topY, $width, $height, $color, $filled=true) {
        $points = array(
            $topX, $topY,
            $topX, $topY + $height,
            $topX + $width, $topY + $height,
            $topX + $width, $topY
        );
        return $this->polygon($points, $numPoints=4, $color, $filled);
    }

    /**
     * ??? ?? ? ?????? ???? ? (0,0) ???? ??? ??? ?????? (???????????)
	 *
     * @param array   ???, ????? ???? ????, ?? points[0] = x0, points[1] = y0, points[2] = x1, points[3] = y1, etc.
     * @param integer ??? ?????????
	 * @param string  ???
	 * @param boolean ???? ????
     */
    public function ellipse($x, $y, $w, $h, $color=null, $filled=true)
    {
		$color = $this->_createColor($color, '000000');
		if ($filled) {
			return imagefilledellipse($this->im, $x, $this->height - $y, $w, $h, $color);
		} else {
			return imageellipse($this->im, $x, $this->height - $y, $w, $h, $color);
		}
    }


    public function dashline($x1, $y1, $x2, $y2, $thick=1)
    {
        $w     = $this->_createColor('fff');
        $red   = $this->_createColor('000');
        $style = array($red,$red,$red,$red,$red,$w,$w,$w,$w,$w);
        imagesetstyle($this->im, $style);
        return $this->line($x1, $y1, $x2, $y2, IMG_COLOR_STYLED, $thick);
    }

	/**
	 * ????? ???? ????? ???? (X, Y)
	 *
	 * @param  string  ?? ?????
	 * @param  integer ???? X
	 * @param  integer ???? Y
	 * @return boolean ??? ????
	 */
	public function addImage ($file, $x, $y)
	{
		$bgFile = new Image();
		if (!$bgFile->open($file)) {
			return false;
		}
		return imagecopy($this->im, $bgFile->im, $x, $y, 0, 0, $bgFile->width, $bgFile->height);
	}

	/**
	 * ?????????? ???? ????-???
	 *
	 * @param boolean ?? TRUE, ?????? dithering, ?? ????????????????? ? ????? ????????
	 */
	public function toGray($dither=true)
	{
		// ?????????????? ??????
		$colorsCount = imagecolorstotal($this->im);
		// ?? ? ???? ?????? truecolor-????????????/palette ??????
		if ($colorsCount == 0) {
			imagetruecolortopalette($this->im, $dither, $i=256);
		}
		while ($i--) {
			// ????????????????? ??????red, green ?blue, ?????????????? ????
			// ?? ????????? ???????.
			$c   = @imagecolorsforindex($this->im, $i);
			$min = min($c['red'], $c['green'], $c['blue']);
			$max = max($c['red'], $c['green'], $c['blue']);
			$c   = ($max + $min) / 2;
			// ????????????????????????? ???????????? ???????? ??????
			// ????????????????????? ??????? ??????? ????? ?????????
			imagecolorset($this->im, $i, $c, $c, $c);
		}
	}

	/**
	 * ????????? ????? ?????
	 *
	 * @param  string  ?? ?????
	 * @return array   ??? ???? ????? (width, height, type ??.)
	 */
	public static function getInfo($file)
	{
		if (!file_exists($file)) {
			return array();
		}
		$types = array(
			1  => 'gif',
			2  => 'jpg',
			3  => 'png',
			4  => 'swf',
			5  => 'psd',
			6  => 'bmp',
			7  => 'tiff-intel',
			8  => 'tiff-motorola',
			9  => 'jpc',
			10 => 'jp2',
			11 => 'jpx'
		);
		$imageInfo = getimagesize($file, $info);
		if ($imageInfo == null) {
			return array();
		}
		$imageInfo['color']      = null;
		if (isset($imageInfo['channels'])) {
			$imageInfo['color'] = $imageInfo['channels'] == 3 ? 'RGB' : 'CMYK' ;
		}
		$imageInfo['width']      = $imageInfo[0];
		$imageInfo['height']     = $imageInfo[1];
		$imageInfo['type']       = $types[$imageInfo[2]];
		$imageInfo['attributes'] = $imageInfo[3];
		return $imageInfo;
	}

	/**
	 * ?????? ???, ??????????? ????? ????? ????
	 *
	 * @param  string  ???
	 */
	private function _fatal($info=null)
	{
		echo $info;
		exit;
	}

	/**
	 * ????? ???
	 *
	 * @param  string  ???
	 */
	private function _error($info=null)
	{
		echo $info;
		return false;
	}

	/**
	 * ??? ???? hex
	 *
	 * @param  string  ??? ?? ffffff ???
	 * @param  string  ???? ? ?????, ?? $hex ? ???? (??? ?? ffffff ???
	 * @return integer ??????????, ???????? ??? ???????? ???? RGB-??????
	 */
	protected function _createColor($hex, $default=null)
	{
        $hex = str_replace('#', '', $hex);
        $a = $this->_htmlColorArray($hex, $default);
		if (count($a) == 0) {
			return false;
		}
		return imagecolorallocate($this->im, $a[0], $a[1], $a[2]);
	}

    // ??????????????ASCII ????
    function to_ord($string) {
        $s = '';
        $cir = '???????????????????';
        for ($i = 0; $i < strlen($string); $i++) {
            $n = $string[$i];
            if (stristr($cir, $n)) {
                $n = 848 + ord($n);
                $s .= "&#$n;";
            } else {
                //$n = ord($n);
                $s .= $n;
            }
        }
        return $s;
    }

	/**
	 * ??????hex ??????? ??????
	 *
	 * @param  string  ??? ?? ffffff ???
	 * @param  string  ???? ? ?????, ?? $s ? ???? (??? ?? ffffff ???
	 * @return array   RGB ?????
	 */
	private function _htmlColorArray($s, $default=null) {
		if (strlen($s) != 6) {
			if (strlen($s) != 3) {
				return $this->_htmlColorArray($default);
			}
			$s = $s[0].$s[0].$s[1].$s[1].$s[2].$s[2];
		}
		$a    = array();
		$s    = strtolower($s);
		$a[0] = hexdec('0x' . substr($s, 0, 2));
		$a[1] = hexdec('0x' . substr($s, 2, 2));
		$a[2] = hexdec('0x' . substr($s, 4, 2));
		return $a;
	}

    // ??? ?????????? imageline ?? ????? ?????? ????
    private function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick=1)
    {
        if ($thick == 1) {
            return imageline($image, $x1, $y1, $x2, $y2, $color);
        }
        $t = $thick / 2 - 0.5;
        if ($x1 == $x2 || $y1 == $y2) {
            return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
        }
        $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
        $a = $t / sqrt(1 + pow($k, 2));
        $points = array(
            round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
            round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
            round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
            round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
        );
        imagefilledpolygon($image, $points, 4, $color);
        return imagepolygon($image, $points, 4, $color);
    }

}










?>
