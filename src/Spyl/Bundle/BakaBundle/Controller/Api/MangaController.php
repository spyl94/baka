<?php

namespace Spyl\Bundle\BakaBundle\Controller\Api;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MangaController extends FOSRestController
{

    /**
     * List all mangas.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function cgetMangasAction(Request $request)
    {
       return $this->container->get('doctrine.entity_manager')->getRepository('SpylBakaBundle:Manga')->findAll();
    }

	/**
     * Get a single manga.
     *
     * @ApiDoc(
     *   output = "Acme\DemoBundle\Model\Note",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="note")
     *
     * @param Request $request the request object
     * @param int     $id      the note id
     *
     * @return array
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function getMangaAction(Request $request, $id)
    {

    	$manga = $this->container->get('doctrine.entity_manager')->getRepository('SpylBakaBundle:Manga')->find($id);

        if (!$manga) {
            throw $this->createNotFoundException("Manga does not exist.");
        }

        return $manga;
    }


    public function getMangaReadableAction(Request $request, $id)
    {
        // TODO: write logic here
    }
}
