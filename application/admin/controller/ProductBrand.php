<?php
namespace app\admin\controller;
use think\Request;

class ProductBrand extends Common{
    protected $brand_db;
    protected function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->brand_db=new \app\admin\model\ProductBrand();
    }

    public function index(){
        $count=$this->brand_db->getCount();
        $brandList=$this->brand_db->getBrandList();
        return $this->fetch('',[
            'count'=>$count,
            'brandList'=>$brandList
        ]);
    }
    public function edit(Request $request){
        $id=intval(input('get.id'));
        $res=$this->brand_db->getBrandById($id);
        $this->assign('brand_id',$id);
        $this->assign('brand',$res);
        return $this->fetch();
    }
    public function doEdit(Request $request){
        if($request->isPost()){
            $savename=null;
            $logo=$request->file('brand_logo');
            if($logo){
                $info = $logo->validate(['size'=>204800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public/uploads');
                if($info){
                    $savename=$info->getSaveName();
                }else{
                    // 上传失败获取错误信息
                    $this->error($logo->getError(),'productBrand/edit');
                }
            }
            $validate = validate('ProductsBrand');
            if (!$validate->scene('edit')->check(input('post.'))) {
                $this->error($validate->getError());
            }
            $res=$this->brand_db->doEdit(input('post.'),$savename);
            if($res){
                $this->success('更新品牌成功','productBrand/index.html');
            }else{
                $this->error('更新品牌失败，请重试');
            }
        }
    }
    public function add(){
        return $this->fetch();
    }
    public function doAdd(Request $request){
        if($request->isPost()){
            $logo=$request->file('brand_logo');
            if($logo){
                $info = $logo->validate(['size'=>204800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public/uploads');
                if($info){
                    $savename=$info->getSaveName();
                }else{
                    // 上传失败获取错误信息
                    $this->error($logo->getError(),'productBrand/edit');
                }
            }else{
                $this->error('请上传品牌LOGO');
            }
            $validate = validate('ProductsBrand');
            if (!$validate->check(input('post.'))) {
                $this->error($validate->getError());
            }
            $res=$this->brand_db->doAdd(input('post.'),$savename);
            if($res){
                $this->success('添加品牌成功','productBrand/index.html');
            }else{
                $this->error('添加品牌失败，请重试');
            }
        }
    }
}