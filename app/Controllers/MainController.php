<?php

namespace App\Controllers;
use App\Models\MainModel;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new \App\Models\MainModel();
        $this->category = new \App\Models\CategoryModel();
    }

    public function product($product)
    {
        echo $product;
    }

    public function Logatoc()
    {
        $data = ['product' => $this->product->findAll(),
        'category' => $this->category->findAll()];
        return view('products', $data);
    }

    public function index()
    {
       //
    }

    public function delete($id)
    {
        $this->product->where('id', $id)->delete();
    }

    public function edit($id)
    {
        $data = ['product' => $this->product->findAll(),
        'category' => $this->category->findAll(),
        'pro' => $this->product->where('id', $id)->first(),];
        return view('products', $data);
    }

    public function save()
    {
        $id = $_POST['id'];
        $data = [
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription' => $this->request->getVar('ProductDescription'),
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            'ProductQuantity' => $this->request->getVar('ProductQuantity'),
            'ProductPrice' => $this->request->getVar('ProductPrice'),
        ];
        if($id != null){
            $this->product->set($data)->where('id', $id)->update();
        }else{
            $this->product->save($data);
        }
        return redirect()->to('/product');
    }

}
