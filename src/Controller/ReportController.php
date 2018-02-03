<?php

namespace App\Controller;

use App\Entity\Item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Vich\UploaderBundle\Form\Type\VichImageType;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportController extends Controller
{

    /**
     * @Template
     *
     * @return array
     */

    public function indexAction()
    {

        return [];

    }
    /**
     * @Template
     *
     * @return array
     */

    public function lostAction()
    {

        return [];

    }
    /**
     * @Template
     *
     * @return array
     */
    public function foundAction(CategoryRepository $repository, Request $request)
    {

        $form = $this->getForm($repository)
            ->add('status',HiddenType::class,['data'=>Item::STATUS_FOUND])
            ->getForm();


        /**
         * @var \Symfony\Component\Form\Form $form
         */
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('report_submitted');
        }
        return ['form'=>$form->createView()];


    }
    /**
     * @Template
     *
     * @return array
     */
    public function submittedAction()
    {
        return [];
    }

    /**
     * @param CategoryRepository $repository
     * @return mixed
     */
    private function getForm(CategoryRepository $repository){


        $item = new Item();
        $form = $this->createFormBuilder($item)
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('category',ChoiceType::class,[
                'choices'=>$repository->findAll(),
                'choice_label' => function($category, $key, $index) {
                    /** @var \App\Entity\Category $category */
                    return strtoupper($category->getTitle());
                },
            ])
            ->add('pictureFile', VichImageType::class,  array('label' => 'Slika'))
            ->add('save', SubmitType::class, array('label' => 'Report item'));

        return $form;
    }
}