<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OrderLineRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    ): Response {
        $categories = $categoryRepository->findAll();
        $flashSaleProducts = $productRepository->findFlashSaleProducts();
        $bestSellingProducts = $productRepository->findBestSellingProducts();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'flashSaleProducts' => $flashSaleProducts,
            'bestSellingProducts' => $bestSellingProducts,
        ]);
    }
}
