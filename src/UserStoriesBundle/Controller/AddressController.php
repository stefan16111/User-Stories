<?php

namespace UserStoriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UserStoriesBundle\Entity\Address;
use Symfony\Component\HttpFoundation\Request;
use UserStoriesBundle\Form\AddressType;

class AddressController extends Controller {

    /**
     * @Route("/{id}/delete", name="delete_address")
     * @Template("UserStoriesBundle::show.html.twig")
     */
    public function deleteAction($id) {
        $request = $this->getDoctrine()->getEntityManager();
        $del_address = $request->getRepository('UserStoriesBundle:Address')->find($id);
        $user_id = $del_address->getAddressUser()->getId();

        $request->remove($del_address);
        $request->flush();

        return $this->redirect($this->generateUrl('showUser', array('id' => $user_id)));
    }

    /**
     * @Route("/{id}/addAddress", name="add_address")
     * @Template("UserStoriesBundle::address_form.html.twig")
     */
    public function addAddressAction(Request $request, $id) {
        $new_address = new Address();
        $form = $this->createForm(AddressType::class, $new_address);

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getRepository('UserStoriesBundle:User')->find($id);

        $new_address->setAddressUser($em);

        if ($form->isSubmitted()) {
            $new_address = $form->getData();

            $em_ad = $this->getDoctrine()->getManager();
            $em_ad->persist($new_address);
            $em_ad->flush();
            return $this->redirectToRoute('showUser', array('id' => $id));
        }
        return array('form' => $form->createView());
    }

}
