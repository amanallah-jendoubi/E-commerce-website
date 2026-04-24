<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category/{categoryName}', name: 'app_category')]
    public function index($categoryName, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);
        $products = $category->getProducts();
        return $this->render('category/index.html.twig', [
            'category' => $category,
            'products' => $products
        ]);
    }


    #[Route('/category/{categoryName}/{productId}', name: 'app_category_product')]
    public function productInfo(
         string $categoryName,
         int $productId,
        ProductRepository $productRepository
    ): Response {
        $product = $productRepository->find($productId);
        return $this->render('category/product.html.twig', [
            'product' => $product,
        ]);
    }




}
