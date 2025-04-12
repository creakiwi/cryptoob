<?php

namespace Cryptoob\Application\Controller;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

trait TwigRenderer
{
    public function __construct(private Environment $twig)
    {
    }

    protected function render(string $view, array $parameters = [], ?Response $response = null): Response
    {
        return $this->doRender($view, null, $parameters, $response, __FUNCTION__);
    }

    private function doRender(string $view, ?string $block, array $parameters, ?Response $response, string $method): Response
    {
        $content = $this->doRenderView($view, $block, $parameters, $method);
        $response ??= new Response();

        if (200 === $response->getStatusCode()) {
            foreach ($parameters as $v) {
                if ($v instanceof FormInterface && $v->isSubmitted() && !$v->isValid()) {
                    $response->setStatusCode(422);
                    break;
                }
            }
        }

        $response->setContent($content);

        return $response;
    }

    private function doRenderView(string $view, ?string $block, array $parameters, string $method): string
    {
        foreach ($parameters as $k => $v) {
            if ($v instanceof FormInterface) {
                $parameters[$k] = $v->createView();
            }
        }

        if (null !== $block) {
            return $this->twig->load($view)->renderBlock($block, $parameters);
        }

        return $this->twig->render($view, $parameters);
    }
}
