<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('text', Type\TextType::class)
            ->add('dropdown', Type\ChoiceType::class, [
                'choices' => [1, 2, 3],
            ])
            ->add('multiple', Type\ChoiceType::class, [
                'choices' => [1, 2, 3],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('text2', Type\TextType::class)
            ->add('checkbox', Type\CheckboxType::class)
            ->add('submit', Type\SubmitType::class)
            ->getForm()
        ;

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
