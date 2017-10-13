<?php
namespace app\admin\validate;
use think\Validate;
class Product extends Validate{
    protected $rule=[
        ['product_name','require','请输入产品名称'],
        ['no','require','请输入产品货号'],
        ['picture','require','请上传封面图片'],
        ['product_style_id','require','请填写主风格'],
        ['price','require|number','请填写价格|价格必须是数字'],
        ['discount','number|between:0,1','折扣必须是数字|折扣不能大于1'],
        ['status','require','请填写产品状态'],
        ['color','require','请填写产品颜色'],
        ['size','require','请填写产品尺寸'],
        ['materials','require','请填写产品主材'],
        ['content','require','请填写产品详情']
    ];
    /*场景设置*/
//    protected $scene=[
//        'add'=>['name','parent_id','id'],
//        'listorder'=>['id','listorder'],
//        'status'=>['id','status'],
//    ];
}