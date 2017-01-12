<?php

namespace UserStoriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UserStoriesBundle\Entity\Phone;
use Symfony\Component\HttpFoundation\Request;
use UserStoriesBundle\Form\PhoneType;

class PhoneController extends Controller {

    /**
     * @Route("/{id}/delete", name="delete_phone")
     * @Template("UserStoriesBundle::show.html.twig")
     */
    public function deleteAction($id) {
        $request = $this->getDoctrine()->getEntityManager();
        $del_phone = $request->getRepository('UserStoriesBundle:Phone')->find($id);
        $user_id = $del_phone->getPhoneUser()->getId();

        $request->remove($del_phone);
        $request->flush();

        return $this->redirect($this->generateUrl('showUser', array('id' => $user_id)));
    }

    /**
     * @Route("/{id}/addPhone", name="add_tel")
     * @Template("UserStoriesBundle::phone_form.html.twig")
     */
    public function addPhoneAction(Request $request, $id) {
        $new_tel = new Phone();
        $form = $this->createForm(PhoneType::class, $new_tel);

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getRepository('UserStoriesBundle:User')->find($id);

        $new_tel->setPhoneUser($em);

        if ($form->isSubmitted()) {
            $new_tel = $form->getData();

            $ad_tl = $this->getDoctrine()->getManager();
            $ad_tl->persist($new_tel);
            $ad_tl->flush();
            return $this->redirectToRoute('showUser', array('id' => $id));
        }
        return array('form' => $form->createView());
    }

}
