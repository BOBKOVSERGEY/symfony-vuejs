<?php

namespace App\Form\Handler;

use App\Entity\Product;
use App\Utils\File\FileSaver;

use App\Utils\Manager\ProductManager;
use Symfony\Component\Form\Form;

class ProductFormHandler
{

    private FileSaver $fileSaver;
    private ProductManager $productManager;

    public function __construct(ProductManager $productManager, FileSaver $fileSaver)
    {

        $this->fileSaver = $fileSaver;
        $this->productManager = $productManager;
    }

    public function processEditForm(Product $product, Form $form)
    {
        $this->productManager->save($product);
        $newImageFile = $form->get('newImage')->getData();

        $tempImageFilename = $newImageFile
            ? $this->fileSaver->saveUploadedFileIntoTemp($newImageFile)
            : null;


        $this->productManager->updateProductImage($product, $tempImageFilename);

        $this->productManager->save($product);
        return $product;
    }


}