<?php

namespace App\Controller;

use App\Entity\Content;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap" )
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        $elements_count = $em->getRepository(Content::class)->count(['published'=>1]);
        $sitemaps_count = ceil($elements_count / 10000);

        $response = new Response(
            $this->renderView('sitemap/sitemap.html.twig', array(
                'sitemaps_count' => $sitemaps_count,
                'hostname' => $hostname,
                )),
            200
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    /**
     * @Route("sitemap_{token}.xml", name="sitemap_part")
     * @param Request $request
     * @param $token
     * @return Response
     */
    public function sitemap_part(Request $request, $token): Response{
        $em = $this->getDoctrine()->getManager();
        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        // add dynamic urls, like blog posts from your DB
        foreach ($em->getRepository(Content::class)->findBy(['published'=>1],[], 10000, $token * 10000 - 10000 ) as $post) {
            $urls[] = array(
                'loc' => $hostname.$post->getPath(),
                'date' => $post->getModifyDate(),
            );
        }

        $response = new Response(
            $this->renderView('sitemap/sitemap_part.html.twig', array( 'urls' => $urls,
                'hostname' => $hostname)),
            200
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }



}
