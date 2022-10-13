<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class ClassRoomController extends AbstractController
{
    #[Route('/class/room', name: 'app_class_room')]
    public function index(): Response
    {
        return $this->render('class_room/index.html.twig', [
            'controller_name' => 'ClassRoomController',
        ]);
    }
   
     #[Route('/addClassroomForm', name: 'addClassroomForm')]
     public function addClassRoom(Request $request,ManagerRegistry $doctrine)
     {
         $classroom= new  addClassRoom();
         $form= $this->createForm(ClassroomType::class,$student);
         $form->handleRequest($request) ;
         if($form->isSubmitted()){
              $em= $doctrine->getManager();
              $em->persist($student);
              $em->flush();
              return  $this->redirectToRoute("addclassroomForm");
          }
         return $this->renderForm("classroom/add.html.twig",array("FormClassroom"=>$form));
    }

        #[Route('/updateclassroom/{name}', name: 'update_classroom')]
        public function updateStudentForm($nce,StudentRepository  $repository,Request  $request,ManagerRegistry $doctrine)
        {
            $student= $repository->find($name);
            $form= $this->createForm(StudentType::class,$classroom);
            $form->handleRequest($request) ;
            if($form->isSubmitted()){
                $em= $doctrine->getManager();
                $em->flush();
                return  $this->redirectToRoute("addClassroomForm");
            }
            return $this->renderForm("classroom/update.html.twig",array("FormStudent"=>$form));
     }

     #[Route('/removeclassroom/{name}', name: 'remove_classroom')]
     public function remove(ManagerRegistry $doctrine,$nce,ClassRoomRepository $repository)
     {
         $student= $repository->find($name);
         $em= $doctrine->getManager();
         $em->remove($classroom);
         $em->flush();
         return $this->redirectToRoute("addClassroomForm");
     }
    

    #[Route('/listClassroom', name: 'listClassroom')]
    public function listStudent(StudentRepository  $repository)
    {
        $students= $repository->findAll();
        return $this->render("classroom/list.html.twig",array("tabClassroom"=>$classroom));
    }
}





