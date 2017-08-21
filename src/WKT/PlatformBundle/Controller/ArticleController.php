<?php 
// src/WKT/PlatformBundle/Controller/ArticleController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Form\PartType;
use WKT\PlatformBundle\Form\VideoType;
use WKT\PlatformBundle\Repository\PartRepository;



class ArticleController extends Controller
{
	public function indexAction()
	{

	}

	public function viewAction(Article $id)
	{

		$articleRepository = $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:Article');

		$article = $articleRepository->find($id);

		return $this->render('WKTPlatformBundle:Article:view.html.twig', array('article' => $article));
	}

	public function addAction(Request $request, Training $id)
	{
		$article = new Article();
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($id);
		// $order = $this->container->get('wkt_platform.summary')->getOrderForPart($id);
		
		$form = $this->generateForm($article, $id);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

			return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getPart()->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
		}

	  return $this->render('WKTPlatformBundle:Article:add.html.twig', array(
	    'form' => $form->createView(),
	    'training' => $id,
	    'summary' => $summary,
	    // 'order' => $order
	  ));
	}


	private function generateForm(Article $article, Training $id)
	{
		$em = $this->getDoctrine()->getManager();
		$parts = $em->getRepository('WKTPlatformBundle:Part')->getPartsByTrainingAsArray($id);

		return $this->createFormBuilder($article)
			->add('title')
			->add('introduction', TextareaType::class, array(
			    'attr' => array('class' => 'tinymce')))
			->add('content', TextareaType::class, array(
			    'attr' => array('class' => 'tinymce')))
			->add('orderInPart', HiddenType::class)
			->add('part', EntityType::class, array(
			    'class' => 'WKTPlatformBundle:Part',
			    'choice_label' => 'title',
			    'multiple' => false,
			    'query_builder' => function(PartRepository $repository) use($id){
			        return $repository->qbPartsByTraining($id);
			    }
			    ))
			->add('video', VideoType::class)
			->add('save', SubmitType::class)
			->getForm();
	}
}
// ->add('part', ChoiceType::class, array(
// 	'multiple' => false,
//     'choices' => $parts,
//     'group_by' => function($val, $key, $index) {
//         if ($val === null) {
//             return 'Nouvelle partie';
//         } else {
//             return 'Parties existantes';
//         }
//     },
//     ))
