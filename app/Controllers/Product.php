<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;


class Product extends BaseController
{
	public function index($id)
	{
        $db = new ProductModel();
        $product = $db->getProduct($id);

        $header_data = [
            'page_title' => $product['title'],
        ];
        $main_data = [
            'solo' => true,
            'product' => $product,
        ];

        //$this->response->setJSON(['lol'=>'asd']);
        echo view('/templates/header', $header_data);
        echo view('/product', $main_data);
        echo view('/templates/footer');
	}
	public function all()
    {
        $db = new ProductModel();
        $header_data = [
            'page_title' => 'Products',
        ];

        $res = $db->getProduct();
        if($res){
            $product = $res->getResult();
            $main_data = [
                'solo' => false,
                'product' => $product,
            ];
            }
        else
            $main_data= [
                'solo' => false,
                'product' => NULL,
            ];
        echo view('/templates/header', $header_data);
        echo view('/product', $main_data);
        echo view('/templates/footer');
    }
    public function delete($id)
    {
        $db = new ProductModel();
        $session = session();
        $img_href = $db->deleteProduct($id);
        unlink(realpath(FCPATH.'/'.$img_href));
    }
    public function add()
    {
        $db = new ProductModel();
        $session = session();
        $previous_url = $session->get('_ci_previous_url');

        move_uploaded_file($_FILES["image"]["tmp_name"], FCPATH.'/img/'.$_FILES["image"]["name"]);

        $db->addProduct(array_merge($this->request->getVar(), ['img_href' => 'img/'.$_FILES["image"]["name"]]));

        return redirect()->to($previous_url);
    }
}
