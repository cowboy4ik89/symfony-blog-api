<?php

namespace BlogBundle\Action\Blog;

use BlogBundle\Responder\ResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GetOneBlog
 * @package BlogBundle\Action\Blog
 */
final class GetOneBlog
{
    /**
     * @var ResponderInterface
     */
    private $responder;

    /**
     * GetOneBlog constructor.
     *
     * @param ResponderInterface $responder
     */
    public function __construct(ResponderInterface $responder)
    {
        $this->responder = $responder;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return new Response();
    }
}
