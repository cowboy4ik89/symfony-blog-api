<?php

namespace BlogBundle\Controller\Api\v1;

use BlogBundle\Entity\Blog;
use BlogBundle\Form\ApiV1\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class BlogController
 * @package BlogBundle\Controller\Api\v1
 */
class BlogController extends Controller
{
    /**
     * @param Blog $blog
     *
     * @return JsonResponse
     */
    public function getAction(Blog $blog): JsonResponse
    {
        return json_encode(['id' => $blog->getId()]);
    }

    /**
     * @return JsonResponse
     */
    public function getAllAction(Request $request): JsonResponse
    {

        return $this->json($this->get('blog_bundle.blog.manager')->findAll());
    }

    /**
     * @return JsonResponse
     */
    public function getAllSinceAction(): JsonResponse
    {
        return $this->json([]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createAction(Request $request): JsonResponse
    {
        return $this->saveBlog($request, new Blog(), Request::METHOD_POST);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function updateAction(Request $request, Blog $blog): JsonResponse
    {
        return $this->saveBlog($request, $blog, Request::METHOD_PUT);
    }

    private function saveBlog(Request $request, Blog $blog, $httpMethod)
    {

        $form = $this->createForm(BlogType::class, $blog, ['method' => $httpMethod]);
        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->json(
                $this->get('blog_bundle.blog.manager')->save($blog)
            );
        }

        return $this->json($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }
}
