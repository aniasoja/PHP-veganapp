<?php

/**
 * Homepage Controller
 */

namespace App\Controller;

use App\Entity\Products;
use App\Entity\Shops;
use App\Form\ProductType;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class HomepageController.
 */
class HomepageController extends AbstractController
{
    /**
     * Index action.
     *
     * @Route("/",
     *     name="homepage")
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
     *     "/product/{id}",
     *     name="product",
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

// ...
    /**
     * New action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP request
     * @param \App\Repository\ProductsRepository $repository Products repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/new",
     *     methods={"GET", "POST"},
     *     name="product_new",
     * )
     */
    public function new_product(Request $request, ProductsRepository $repository): Response
    {
        $products = new Products();
        $form = $this->createForm(ProductType::class, $products);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $products->setIsReviewed(0);
            $repository->save($products);

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'new.html.twig',
            ['form' => $form->createView()]
        );
    }
    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request    HTTP request
     * @param \App\Entity\Products                      $category   Category entity
     * @param \App\Repository\ProductsRepository        $repository Category repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/edit/{id}",
     *     methods={"GET", "PUT"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="edit",
     * )
     */
    /*public function edit(Request $request, Products $products, ProductsRepository $repository): Response
    {
        $form = $this->createForm(ProductType::class, $products, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($products);

            $this->addFlash('success', 'message.updated_successfully');

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'edit.html.twig',
            [
                'form' => $form->createView(),
                'products' => $products,
            ]
        );
    }
    */
}