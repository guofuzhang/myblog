<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-20 0020
 * Time: 17:27
 */
//function maop($arr)
//{
//    $length=count($arr);
//    for ($i=0;$i<$length-1;$i++)
//    {
//       for($j=$i+1;$j<$length-1;$j++)
//       {
//           if($arr[$j]>$arr[$j+1])
//           {
//               $kong=$arr[$j];
//               $arr[$j]=$arr[$j+1];
//               $arr[$j+1]=$kong;
//           }
//       }
//
//    }
//    echo "<pre>";
//    print_r($arr);
//
//};
//$arr1=[1,2,5,4,3,8,6,96,45];
//maop($arr1);

function digui($n)
{
    if ($n==1)
    {
        return 1;
    }else
        {
            return $n*digui($n-1);
        }
}

echo digui(5);