<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Person;
use App\Form\SearchPersonType;

class HelloController extends AbstractController
{
    /**
     * @Route("/", name="hello")
     */
    public function index(Request $request)
    {
        $person = new Person();
        $form = $this->createForm(SearchPersonType::class, $person);

        $form->handleRequest($request);

        $foundPerson = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $repository = $entityManager->getRepository(Person::class);

            $foundPerson = $repository->findOneByName($person->getName());
            if (!$foundPerson) {
                throw new \Exception('Pas trouvé');
            }
        }

        return $this->render('hello/index.html.twig', [
            'found_person' => $foundPerson,
            'form' => $form->createView(),
        ]);
    }
}
