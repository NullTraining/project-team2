<?php

namespace App\Controller;

use App\Entity\Item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * @Embedded\Embedded
 */
class ReportController
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

    public function foundAction()
    {

        return [];

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