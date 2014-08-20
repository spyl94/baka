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
     * @param Request $request the request object
     *
     * @return array
     */
    public function cgetMangasAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('SpylBakaBundle:Manga')->findAll();
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
    	$em = $this->getDoctrine()->getManager();
    	$manga = $em->getRepository('SpylBakaBundle:Manga')->find($id);

        if (!$manga) {
            throw $this->createNotFoundException("Manga does not exist.");
        }

        return $manga->getContents();
    }


    public function getMangaContentAction($mangaId, $contentId)
    {
        $em = $this->getDoctrine()->getManager();

        $content = $em->getRepository('SpylBakaBundle:Content')->findOneBy([
        	"id" => $contentId, 
        	"manga" => $em->getReference('Spyl\Bundle\BakaBundle\Model\Manga', $mangaId)
        ]);

        if (!$content) {
            throw $this->createNotFoundException("Content does not exist.");
        }

        $files = $this->get('baka.page_reader')->listPages($content);

        return $files;
    }
}
