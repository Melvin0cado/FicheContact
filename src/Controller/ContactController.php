<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;

use \Swift_Message;
use \Swift_Mailer;
use \Swift_SmtpTransport;

use App\Entity\Departement;
use App\Entity\Message;
use App\Form\MessageType;

class ContactController extends AbstractController
{
   
    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('FicheContact/home.html.twig');
    }

    /**
     * @Route("/contact/success", name="contact_success")
     */
    public function success(){
        return $this->render('FicheContact/success.html.twig');
    }

    /**
     * @Route("/contact/new", name="contact_create")
     */
    public function create(Request $request, ObjectManager $manager){

        $repository = $this->getDoctrine()->getRepository(Departement::class);

        $message = new Message();

        $formMessage = $this->createForm(MessageType::class, $message);

        $formMessage->handleRequest($request);

        if($formMessage->isSubmitted() && $formMessage->isValid()){

            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername('melvin.cado@gmail.com')
                    ->setPassword('zpaagkzabaaoimlv')
            ;
           
            $mailer = new Swift_Mailer($transport);
            
            $mail = new Swift_Message();

            $departement = $repository->findOneByNomDepartement($message->getDepartement());

            $mail->setFrom($message->getMail())
                ->setTo($departement->getMailDepartement())
                ->setSubject('Fiche Contact '.$departement->getNomDepartement() )
                ->setBody($message->getMessage())
            ;

            $result = $mailer->send($mail);
            
            $manager->persist($message);
            $manager->flush();

            return $this->redirectToRoute('contact_success');
        }

        return $this->render('FicheContact/create.html.twig', [
            'formMessage' => $formMessage->createView()
        ]);
    }
}