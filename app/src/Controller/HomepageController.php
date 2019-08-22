<?php

/**
 * Homepage Controller
 */

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomepageController.
 */
class HomepageController extends AbstractController
{
    /**
     * Index action.
     *
     * @Route("/")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     */
    public function index(ProductsRepository $repository): Response
    {
        return $this->render(
            'index.html.twig',
            ['data' => $repository->findAllReviewed()]
        );
    }


// ...

    /**
     * View action.
     *
     * @param \App\Repository\ProductsRepository $repository Repository
     * @param int $id Element Id
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     name="products",
     *     requirements={"id": "[1-9]\d*"},
     * )
     */
    public function view(ProductsRepository $repository, int $id): Response
    {
        return $this->render(
            'view.html.twig',
            ['item' => $repository->findOneById($id)]
        );
    }
// ...
}
