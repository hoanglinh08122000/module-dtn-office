<?php
namespace Dtn\Office\Plugin;

class UseDi
{
//    public function beforeGetDi(\Dtn\Office\Block\Di $subject)
//    {
////        $a = "HelloWorld";
////        return [$a];
//    }

    public function afterGetDi(\Dtn\Office\Block\Di $subject, $result)
    {
//        $result[a]="asdhasd"; thay đổi phần tử ở vị trí thứ a trong mảng
        $result = "HelloWorld";
        return $result;
    }
//
//    public function aroundGetDi(\Dtn\Office\Block\Di $subject, callable $proceed ,$a , $b)
//    {
//        $a="ghi đè 1";
//        $b = "ghi đè 2";
//        return [$a,$b];
//    }
}
