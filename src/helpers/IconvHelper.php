<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/12/9
 * Time: 19:22
 */
namespace juckzhang\ipLookUp\helpers;

class IconvHelper {

    /**
     * 编码转换
     * @param $string
     * @param $target_lang
     * @param $source_lang
     * @return bool|string
     */
    public static function convertIconvMbstring($string, $target_lang, $source_lang)
    {
        if (static::iconvEnabled())
        {
            $return_string = @iconv($source_lang, $target_lang, $string);
            if ($return_string !== false)
            {
                return $return_string;
            }
        }

        if (static::mbstringEnabled())
        {
            if ($source_lang == 'GBK')
            {
                $source_lang = 'CP936';
            }
            if ($target_lang == 'GBK')
            {
                $target_lang = 'CP936';
            }

            $return_string = @mb_convert_encoding($string, $target_lang, $source_lang);
            if ($return_string !== false)
            {
                return $return_string;
            }
            else
            {
                return false;
            }
        }
    }

    private static function iconvEnabled()
    {
        return function_exists('iconv');
    }

    private static function mbstringEnabled()
    {
        if (PHP_VERSION >= '5.0' && function_exists('mb_convert_encoding') && function_exists('mb_list_encodings'))
        {
            $encodings = mb_list_encodings();

            if (in_array('UTF-8', $encodings) == true && in_array('BIG-5', $encodings) == true && in_array('CP936', $encodings) == true) // CP936 就是 GBK 字符集的别名
            {
                return true;
            }
        }

        return false;
    }

}