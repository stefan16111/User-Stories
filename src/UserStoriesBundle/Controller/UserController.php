<?php

namespace UserStoriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UserStoriesBundle\Entity\User;
use UserStoriesBundle\Entity\Phone;
use UserStoriesBundle\Entity\Email;
use UserStoriesBundle\Entity\Address;
use UserStoriesBundle\Entity\Groups;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use UserStoriesBundle\Form\UserType;
use UserStoriesBundle\Form\AddressType;
use UserStoriesBundle\Repository\AddressRepository;
use UserStoriesBundle\Repository\EmailRepository;
use UserStoriesBundle\Repository\PhoneRepository;


class UserController extends Controller
{
    /**
     * @Route("/new", name="new")
     * @Template("UserStoriesBundle:new.html.twig")
     */
    public function newAction(Request $request) {
        $newUser = new User();
        
        $form = $this->createForm(UserType::class, $newUser);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            $newUser = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();
            
            return $this->redirectToRoute('new');
        }

        return $this->render('UserStoriesBundle::new.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    /**
     * @Route("/{id}/modify", name="modify")
     * @Template("UserStoriesBundle:modify.html.twig")
     */
    public function modifyAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $update = $em->getRepository('UserStoriesBundle:User')->find($id);
        $adresid = $update->getUserAddress();
        $update_address = $em->getRepository('UserStoriesBundle:Address')->findOneBy(array('address_user' => $adresid));
        
        $form = $this->createForm(UserType::class, $update);
        $form_address = $this->createForm(AddressType::class, $update_address);
         
        if($form->handleRequest($request)->isValid()){    

            $em->flush();      
            return $this->redirectToRoute('modify', array('id' => $id));
        }
        if($form_address->handleRequest($request)->isValid()){    

            $em->flush();      
            return $this->redirectToRoute('modify', array('id' => $id));
        }

        return $this->render('UserStoriesBundle::modify.html.twig', array(
            'form' => $form->createView(),
            'form_address' => $form_address->createView()
        ));   
    }
    
    /**
     * @Route("/{id}/delete", name="delete")
     */
    public function deleteAction($id) {
        $request = $this->getDoctrine()->getEntityManager();
        $del_user = $request->getRepository('UserStoriesBundle:User')->find($id);

        $request->remove($del_user);
        $request->flush();
      
        return $this->redirectToRoute('showUsers');
    }
    
    /**
     * @Route("/{id}", name="showUser")
     * @Template("UserStoriesBundle::show.html.twig")
     */
    public function showUserAction(Request $request, $id) {
        $em = $this->getDoctrine();
        $user = $em->getRepository('UserStoriesBundle:User')->find($id);
        
        $ad = $em->getRepository('UserStoriesBundle:Address')->showAllUserAddress($id);
        $email = $em->getRepository('UserStoriesBundle:Email')->showAllUserEmail($id);
        $tel = $em->getRepository('UserStoriesBundle:Phone')->showAllUserPhone($id);

        
        return array('user' => $user,
            'adres' => $ad,
            'email' => $email,
            'tel' => $tel);
    }
    
    /**
     * @Route("/", name="showUsers")
     * @Template("UserStoriesBundle::showAllUsers.html.twig")
     */
    public function showAllUsersAction() {
        $em = $this->getDoctrine()->getManager();
        $users_arry = $em->getRepository('UserStoriesBundle:User')
                ->findBy(array(), array('surname' => 'ASC'));
        
        return array('allUsers' => $users_arry);
    }
}
