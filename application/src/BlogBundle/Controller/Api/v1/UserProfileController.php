<?php

namespace BlogBundle\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserProfileController
 * @package BlogBundle\Controller\Api\v1
 */
class UserProfileController extends Controller
{
    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function getAction($id): JsonResponse
    {
        return $this->json(['id' => $id]);
    }

    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        return $this->json([]);
    }

    /**
     * @return JsonResponse
     */
    public function getAllSince(): JsonResponse
    {
        return $this->json([]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        return $this->json(['id' => 1]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        return $this->json(['id' => 1]);
    }
}
