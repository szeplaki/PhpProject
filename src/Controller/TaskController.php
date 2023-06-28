<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Form\Type\TaskType;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task/new')]
    public function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTimeImmutable('tomorrow'));

        $form = $this->createForm(TaskType::class, $task);

        // $form = $this->createFormBuilder($task)
        // ->add('task', TextType::class)
        // ->add('dueDate', DateType::class)
        // ->add('save', SubmitType::class, ['label' => 'Create Task'])
        // ->getForm();


        return $this->render('task/new.html.twig', [
            'form' => $form,
        ]);
    }
}