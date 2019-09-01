<?php
/**
 * Category controller.
 */

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController.
 *
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request    HTTP request
     * @param \App\Repository\CategoriesRepository        $repository Categories repository
     * @param \Knp\Component\Pager\PaginatorInterface   $paginator  Paginator
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route(
     *     "/",
     *     name="category_index",
     * )
     */
    public function index(Request $request, CategoriesRepository $repository, PaginatorInterface $paginator): Response
    {
        /** $pagination = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            Categories::NUMBER_OF_ITEMS
        ); **/

        return $this->render(
            'category.html.twig' /** ,
        ['pagination' => $pagination] **/
        );
    }

    /**
     * View action.
     *
     * @param \App\Entity\Categories $category Categories entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "category/{id}",
     *     name="category",
     *     requirements={"id": "[1-9]\d*"},
     * )
     */
    public function view(Categories $category): Response
    {
        return $this->render(
            'category.html.twig',
            ['category' => $category]
        );
    }
}