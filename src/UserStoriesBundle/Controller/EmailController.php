<?php

namespace UserStoriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UserStoriesBundle\Entity\Email;
use Symfony\Component\HttpFoundation\Request;
use UserStoriesBundle\Form\EmailType;

class EmailController extends Controller {

    /**
     * @Route("/{id}/deleteEmail", name="delete_email")
     * @Template("UserStoriesBundle::show.html.twig")
     */
    public function deleteEmailAction($id) {
        $request = $this->getDoctrine()->getEntityManager();
        $del_email = $request->getRepository('UserStoriesBundle:Email')->find($id);
        $user_id = $del_email->getEmailUser()->getId();

        $request->remove($del_email);
        $request->flush();

        return $this->redirect($this->generateUrl('showUser', array('id' => $user_id)));
    }

    /**
     * @Route("/{id}/addEmail", name="add_email")
     * @Template("UserStoriesBundle::email_form.html.twig")
     */
    public function addEmailAction(Request $request, $id) {
        $new_email = new Email();
        $form = $this->createForm(EmailType::class, $new_email);

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getRepository('UserStoriesBundle:User')->find($id);

        $new_email->setEmailUser($em);

        if ($form->isSubmitted()) {
            $new_email = $form->getData();

            $ad_em = $this->getDoctrine()->getManager();
            $ad_em->persist($new_email);
            $ad_em->flush();
            return $this->redirectToRoute('showUser', array('id' => $id));
        }
        return array('form' => $form->createView());
    }

}
