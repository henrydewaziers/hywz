<?php

namespace Waziers\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Api;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\View;
use JMS\Serializer\SerializationContext;
use Nelmio\ApiDocBundle\Annotation as Doc;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Waziers\ApiBundle\Entity\Furniture;

/**
 * @Api\RouteResource("furnitures")
 *
 * Class DocumentController
 * @package AppBundle\Controller
 */
class DocumentController extends FOSRestController
{
//* @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to
//     *     start listing notes.")
//*
//* @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many notes to return.")
//*
//*

    /**
     * List all notes.
     *
     * @Doc\ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Api\View()
     *
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function cgetAction(ParamFetcherInterface $paramFetcher)
    {
        $em         = $this->getDoctrine()->getRepository('WaziersApiBundle:Furniture');
        $furnitures = $em->findAll();

        return $this->handleView($this->getReturn($furnitures));
    }

    /**
     * Get a single Furniture.
     *
     * @Doc\ApiDoc(
     *   output = "Furniture",
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @param Furniture $furniture the furntiture id
     *
     * @return array
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function getAction(Furniture $furniture)
    {
        return $this->handleView($this->getReturn($furniture));
    }

    /**
     * Creates a new Furniture from the submitted data.
     *
     * @Doc\ApiDoc(
     *   resource = true,
     *   input = "AppBundle\Form\NoteType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Api\RequestParam(
     *   name="title",
     *   description="the title"
     * )
     *
     * @Api\RequestParam(
     *   name="description",
     *   description="the description"
     * )
     *
     * @Api\RequestParam(
     *   name="room",
     *   description="the room"
     * )
     *
     * @param ParamFetcher $paramFetcher the request object
     *
     * @return FormTypeInterface[]|View
     */
    public function cpostAction(ParamFetcher $paramFetcher)
    {
        $em = $this->getDoctrine()->getManager();

        $furniture = new Furniture();
        $furniture
            ->setTitle($paramFetcher->get('title'))
            ->setDescription($paramFetcher->get('description'))
            ->setRoom($paramFetcher->get('room'));

        $em->persist($furniture);
        $em->flush();

        return $this->handleView($this->getReturn($furniture));
    }

    /**
     * Creates a new Furniture from the submitted data.
     *
     * @Doc\ApiDoc(
     *   resource = true,
     *   input = "AppBundle\Form\NoteType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Api\RequestParam(
     *   name="title",
     *   description="the title",
     *   nullable=true
     * )
     *
     * @Api\RequestParam(
     *   name="description",
     *   description="the description",
     *   nullable=true
     * )
     *
     * @Api\RequestParam(
     *   name="room",
     *   description="the room",
     *   nullable=true
     * )
     *
     * @param ParamFetcher $paramFetcher the request object
     *
     * @return FormTypeInterface[]|View
     */
    public function postAction(ParamFetcher $paramFetcher, Furniture $furniture)
    {
        $em = $this->getDoctrine()->getManager();


        $furniture
            ->setTitle(
                $paramFetcher->get('title') ? $paramFetcher->get('title') : $furniture->getTitle()
            )
            ->setDescription(
                $paramFetcher->get('description') ? $paramFetcher->get('description') : $furniture->getDescription()
            )
            ->setRoom(
                $paramFetcher->get('room') ? $paramFetcher->get('room') : $furniture->getRoom()
            );

        $em->persist($furniture);
        $em->flush();

        return $this->handleView($this->getReturn($furniture));
    }



    //    /**
//     * Presents the form to use to update an existing note.
//     *
//     * @Doc\ApiDoc(
//     *   resource = true,
//     *   statusCodes={
//     *     200 = "Returned when successful",
//     *     404 = "Returned when the note is not found"
//     *   }
//     * )
//     *
//     * @Annotations\View()
//     *
//     * @param int $id the note id
//     *
//     * @return FormTypeInterface
//     *
//     * @throws NotFoundHttpException when note not exist
//     */
//    public function editNotesAction($id)
//    {
//        $note = $this->getNoteManager()->get($id);
//        if (false === $note) {
//            throw $this->createNotFoundException("Note does not exist.");
//        }
//
//        return $this->createForm(new NoteType(), $note);
//    }
//
//    /**
//     * Update existing note from the submitted data or create a new note at a specific location.
//     *
//     * @Doc\ApiDoc(
//     *   resource = true,
//     *   input = "AppBundle\Form\NoteType",
//     *   statusCodes = {
//     *     201 = "Returned when a new resource is created",
//     *     204 = "Returned when successful",
//     *     400 = "Returned when the form has errors"
//     *   }
//     * )
//     *
//     * @Annotations\View(
//     *   template="AppBundle:Note:editNote.html.twig",
//     *   templateVar="form"
//     * )
//     *
//     * @param Request $request the request object
//     * @param int     $id the note id
//     *
//     * @return FormTypeInterface|RouteRedirectView
//     *
//     * @throws NotFoundHttpException when note not exist
//     */
//    public function putNotesAction(Request $request, $id)
//    {
//        $note = $this->getNoteManager()->get($id);
//        if (false === $note) {
//            $note       = new Note();
//            $note->id   = $id;
//            $statusCode = Response::HTTP_CREATED;
//        } else {
//            $statusCode = Response::HTTP_NO_CONTENT;
//        }
//        $form = $this->createForm(new NoteType(), $note);
//        $form->submit($request);
//        if ($form->isValid()) {
//            $this->getNoteManager()->set($note);
//
//            return $this->routeRedirectView('get_note', ['id' => $note->id], $statusCode);
//        }
//
//        return $form;
//    }
//
//    /**
//     * Removes a note.
//     *
//     * @Doc\ApiDoc(
//     *   resource = true,
//     *   statusCodes={
//     *     204="Returned when successful"
//     *   }
//     * )
//     *
//     * @param int $id the note id
//     *
//     * @return View
//     */
//    public function deleteNotesAction($id)
//    {
//        $this->getNoteManager()->remove($id);
//        // There is a debate if this should be a 404 or a 204
//        // see http://leedavis81.github.io/is-a-http-delete-requests-idempotent/
//        return $this->routeRedirectView('get_notes', [], Response::HTTP_NO_CONTENT);
//    }
//
//    /**
//     * Removes a note.
//     *
//     * @Doc\ApiDoc(
//     *   resource = true,
//     *   statusCodes={
//     *     204="Returned when successful"
//     *   }
//     * )
//     *
//     * @param int $id the note id
//     *
//     * @return View
//     */
//    public function removeNotesAction($id)
//    {
//        return $this->deleteNotesAction($id);
//    }

    /***
     * return the view for a detail context.
     *
     * @param $objects
     * @param $groups
     *
     * @return View
     */
    private function getReturn($objects, $groups = [])
    {
        $view = $this
            ->view($objects, 200)
            ->setTemplate('WaziersApiBundle:Default:index.html.twig');

        $context = new SerializationContext();
        $context->setGroups(array_merge(['furniture_details'], $groups));

//        $view->setSerializationContext($context);

        return $view;
    }

}
