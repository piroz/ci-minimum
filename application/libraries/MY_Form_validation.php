<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MY_Form_validation
 */
class MY_Form_validation extends CI_Form_validation
{

    /**
     * is_date
     * 
     * 日付書式の文字列が存在する年月日であるかどうか判定する
     * 
     * @param string $str 日付文字列
     * @return boolean
     */
    public function is_date($str)
    {
        try {
            $d = new DateTime($str);
            return checkdate($d->format('m'), $d->format('d'), $d->format('Y'));
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * hasError
     * 
     * バリデーション実行後、エラーが発生していたかどうか返す
     * 
     * @return boolean
     */
    function hasError()
    {
        return count($this->_error_array) > 0;
    }

    /**
     * numZenHan
     * 
     * 「全角」数字を「半角」に変換するフィルタ
     * 
     * @param string $val
     * @return string
     */
    function numZenHan($val)
    {
        return mb_convert_kana($val, 'a');
    }

}
